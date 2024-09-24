<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForms;
use App\Models\FormsAddField;
use Illuminate\Support\Facades\Validator;

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
        $data = [
            'fields' => $fields
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

        $application_forms = new ApplicationForms();
        $application_forms->fill($request->post());
        $application_forms->save();

        // return response()->json(['response' => 'success']);
        return redirect('/application-forms');
    }

    public function delete(Request $request, $id){
        ApplicationForms::where('id', $id)->first()->delete();
        return redirect('/application-forms');
    }

    public function edit(Request $request, $id){
        $application_forms = ApplicationForms::where('id', $id)->first();
        return view('application-forms.edit', ['forms' => $application_forms]);
    }

    // Form Field methods

    public function addField(Request $request){
        $rules = [
            'field_name' => 'required',
            'field_type' => 'required'
        ];

        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $form_fields = new FormsAddField();
        $form_fields->fill($request->post());
        $form_fields->save();

        // return response()->json(['response' => 'success']);
        return redirect('/application-forms/create');
    }

    public function deleteField(Request $request, $id){
        FormsAddField::where('id', $id)->first()->delete();
        return redirect('/application-forms/create');
    }

    public function editField(Request $request, $id){
        $fields = FormsAddField::where('id', $id)->first();
        return view('application-forms.edit-field', ['fields' => $fields]);
    }
}
