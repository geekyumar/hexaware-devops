<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function create(Request $request){
        $rules = [
            'job_title' => 'required|string',
            'job_description' => 'required|string',
            'department' => 'required|string',
            'job_location' => 'required|string',
            'employment_type' => 'required|string',
            'salary_range' => 'required|string',
            'application_deadline' => 'required|date',
            'required_qualifications' => 'required|string',
            'preferred_qualifications' => 'nullable|string',
            'responsibilities' => 'required|string',
        ];

        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors());
        };

        $job = new Jobs();
        $job->fill($request->post());
        $job->is_published = '0';
        $job->save();

        return response()->json('success');
    }

    public function publish(Request $request, $id){
        $job = Jobs::where('id', $id)->update(['is_published' => 1]);
        if($job > 0){ // returns the affected rows count, hence written as > 0.
            return response()->json(['response' => 'success'], 200);
        } else {
            return response()->json(['response' => 'failed'], 500);
        }
    }
}
