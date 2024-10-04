<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobCategories;

class JobCategoryController extends Controller
{
    public function index(Request $request){
        return view('job-categories.index', ['categories' => JobCategories::all()]);
    }

    public function editPage(Request $request, $id){
        return view('job-categories.category-edit', ['category' => JobCategories::where('id', $id)->first()]);
    }

    public function edit(Request $request, $id){

        $rules = [
            'category_type' => 'required',
            'category_name' => 'required'
        ];

        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()]);
        }

        $data = [
            'category_type' => $request->post('category_type'),
            'category_name' => $request->post('category_name'),
        ];

        JobCategories::where('id', $id)->update($data);
        return redirect('/job-categories');
    }

    public function delete(Request $request, $id){
        JobCategories::where('id', $id)->delete();
        return redirect('job-categories');
    }

    public function createPage(Request $request){
        return view('job-categories.create-job', 
        [
            'departments' => JobCategories::where('category_type', 'Department')->get('category_name'),
            'locations' => JobCategories::where('category_type', 'Location')->get('category_name'),
            'employment_types' => JobCategories::where('category_type', 'Employment Type')->get('category_name'),
        ]);
    }

    public function create(Request $request){
        $rules = [
            'category_type' => 'required',
            'category_name' => 'required'
        ];
        
        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()]);
        }

        JobCategories::create($request->post());
        return redirect('job-categories');
    }
}
