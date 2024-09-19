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

        return redirect('/jobs/list');
    }

    public function publish(Request $request, $id){
        $job = Jobs::where('id', $id)->update(['is_published' => 1]);
        if($job > 0){ // returns the affected rows count, hence written as > 0.
            return response()->json(['response' => 'success'], 200);
        } else {
            return response()->json(['response' => 'failed'], 500);
        }
    }

    public function unpublish(Request $request, $id){
        $job = Jobs::where('id', $id)->update(['is_published' => 0]);
        if($job > 0){ // returns the affected rows count, hence written as > 0.
            return redirect('/jobs/list?status=published');
        } else {
            return response()->json(['response' => 'failed'], 500);
        }
    }

    public function list(Request $request){
        if($request->input('status') == 'draft'){
            $jobs = Jobs::where('is_published', 0)->get();
            return view('jobs.list', ['jobs' => $jobs]);
        } else  if($request->input('status') == 'published'){
            $jobs = Jobs::where('is_published', 1)->get();
            return view('jobs.list', ['jobs' => $jobs]);
        } else{
            $jobs = Jobs::all();
            return view('jobs.list', ['jobs' => $jobs]);
        }
    }

    public function edit(Request $request, $id){
        $jobs = Jobs::where('id', $id)->first();
        return view('jobs.edit', ['job' => $jobs]);
    }

    public function update(Request $request, $id){
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

        $job = Jobs::where('id', $id)->first();
        $job->fill($request->post());
        $job->save();

        return redirect('/jobs/list');
    }

    public function delete(Request $request, $id){
        Jobs::where('id', $id)->first()->delete();
        return redirect('/jobs/list');
    }
}