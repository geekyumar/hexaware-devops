<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForms;
use App\Models\FormsAddField;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ApplicationFormController extends Controller
{
    // Application form methods

    public function index(Request $request){
        $application_forms = ApplicationForms::all();
        $data = [
            'forms' => $application_forms
        ];
        return view('application-forms.index', $data);
    }

    public function createPage(Request $request){
        $fields = FormsAddField::all();
        $form_fields = FormsAddField::all();
        $data = [
            'fields' => $fields,
            'formFields' => $form_fields
        ];
        return view('application-forms.create', $data);
    }


    public function create(Request $request){
        $rules = [
            'form_name' => 'required',
            'associated_jobs' => 'required'
        ];

        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $data = $request->all();

        foreach($data as $key => $value){
            if($key == '_token'){
                continue;
            }
            $columnType = Schema::getColumnType('application_forms', $key);
            if($columnType == 'json'){
                $data[$key] = json_encode($value);
            }
        }

        $request->merge($data);
        unset($data['_token']);
        
        // $application_forms = new ApplicationForms();
        // $application_forms->fill($request->post());
        // $application_forms->save();

        DB::table('application_forms')->insert($data);

        // ApplicationForms::create($request->all());

        // return response()->json(['type' => $data['sample5']]);
        return redirect('/application-forms');
    }

    public function delete(Request $request, $id){
        ApplicationForms::where('id', $id)->first()->delete();
        return redirect('/application-forms');
    }

    public function edit(Request $request, $id){
        $application_forms = ApplicationForms::where('id', $id)->first();
        $form_fields = FormsAddField::all();
        return view('application-forms.edit', ['forms' => $application_forms, 'formFields' => $form_fields]);
    }

    public function update(Request $request, $id){
        $rules = [
            'form_name' => 'required',
            'associated_jobs' => 'required'
        ];

        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $data = $request->all();

        foreach($data as $key => $value){
            if($key == '_token'){
                continue;
            }
            $columnType = Schema::getColumnType('application_forms', $key);
            if($columnType == 'json'){
                $data[$key] = json_encode($value);
            }
        }

        $request->merge($data);
        unset($data['_token']);

        DB::table('application_forms')->where('id', $id)->update($data);

        // $application_forms = ApplicationForms::where('id', $id)->first();
        // $application_forms->fill($request->post());
        // $application_forms->save();

        return redirect('/application-forms');
    }


    // Form Field methods

    public function addField(Request $request)
    {
        $rules = [
            'field_name' => 'required',
            'field_type' => 'required'
        ];
    
        $validator = Validator::make($request->post(), $rules);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        Schema::table('application_forms', function (Blueprint $table) use ($request) {
            switch($request->post('field_type')){
                case 'checkbox':
                    $table->json($request->post('field_name'))->nullable();
                default: 
                    $table->string($request->post('field_name'))->nullable();
            }
        });

        $formArray = [
            'field_name' => $request->post('field_name'),
            'field_type' => $request->post('field_type')
        ];
        
        if ($request->post('field_options')) {
            $fieldOptions = explode(',', $request->post('field_options'));
            $formArray['field_options'] = json_encode($fieldOptions);
        }
        
        FormsAddField::create($formArray);

        return redirect('/application-forms/create');
    }

    public function deleteField(Request $request, $id){
        $forms = FormsAddField::where('id', $id)->first();
        Schema::table('application_forms', function (Blueprint $table) use ($forms) {
            $table->dropColumn($forms->field_name);
        });

        $forms->delete();
        return redirect('/application-forms/create');
    }


    public function editFieldPage(Request $request, $id){
        $fields = FormsAddField::where('id', $id)->first();
        return view('application-forms.edit-field', ['fields' => $fields]);
    }

    public function editField(Request $request, $id){
        $rules = [
            'field_name' => 'required',
            'field_type' => 'required'
        ];
    
        $validator = Validator::make($request->post(), $rules);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $field_data = FormsAddField::where('id', $id)->first();

        Schema::table('application_forms', function (Blueprint $table) use ($request, $field_data) {
            $table->renameColumn($field_data->field_name, $request->post('field_name'));
        });
        
        Schema::table('application_forms', function (Blueprint $table) use ($request) {
            switch ($request->post('field_type')) {
                case 'checkbox':
                    $table->json($request->post('field_name'))->nullable()->change();
                    break;
                default: 
                    $table->string($request->post('field_name'))->nullable()->change();
                    break;
            }
        });

        $formArray = [
            'field_name' => $request->post('field_name'),
            'field_type' => $request->post('field_type')
        ];
        
        if ($request->post('field_options')) {
            $fieldOptions = explode(',', $request->post('field_options'));
            $formArray['field_options'] = json_encode($fieldOptions);
        }
        
        FormsAddField::where('id', $id)->update($formArray);

        return redirect('/application-forms/create');

        
        $fields = FormsAddField::where('id', $id)->first();
        return view('application-forms.edit-field', ['fields' => $fields]);
    }
}
