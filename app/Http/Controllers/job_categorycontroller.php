<?php

namespace App\Http\Controllers;

use App\Models\job_category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class job_categorycontroller extends Controller
{
    public function listCategories()
    {
        $categories = job_category::all();
        return view('job_categories.listCategories', compact('categories'));
    }

    public function store(Request $request)
    {
            
            $rules = [ 'category_type' => 'required',
            'category_name' => 'required'];
            $validator = Validator::make($request->post(), $rules);
            if($validator->fails())
            {
                return response()->json(['error' => $validator->errors()]);
            }
            $job_category = new job_category();
            $job_category->fill($request->post());
            $job_category->save();
            return response()->json(['response' => 'success']);

       
        //return redirect()->route('job_categories.listCategories')->with('success', 'Category added successfully');
    }
    public function edit($id , Request $request)
    {
       $rules = [
        'category_rules' => 'required',
        'category_name' => 'required'
       ];
       $validator = Validator::make($request->post(), $rules);
       if ($validator->fails())
       {
        return response()->json(['errors' => $validator->errors()]);
       }
            $job_category = new job_category();
            $job_category->fill($request->post());
            $job_category->edit();
            return response()->json(['response' => 'success']);

    }

    public function update(Request $request, $id)
    {   
        $rules =['category_type' => 'required',
        'category_name' => 'required'];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
        job_category::update($request->all());

        return response()->json(['message' => 'Job category updated successfully']);
    }

    public function destroy($id)
    {    
        $job_category = job_category::where('id', $id);
        $job_category->delete();
        return response()->json(['message' => 'Job category deleted successfully']);
    }
}




