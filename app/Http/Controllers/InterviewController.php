<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InterviewController extends Controller
{
    public function index(Request $request){
        return view('interview.index', ['interviews' => Interview::all()]);
    }

    public function schedulingScreen(Request $request){
        return view('interview.scheduling_screen');
    }

    public function view(Request $request, $id){
        $interview = Interview::where('id', $id)->first();
        return view('interview.view', ['interview' => $interview]);
    }

    public function rescheduleScreen(Request $request, $id){
        return view('interview.reschedule', ['reschedule' => Interview::where('id', $id)->first()]);
    }

    public function reschedule(Request $request, $id){
        $rules = [
            'interview_date' => 'required',
            'interview_time' => 'required'
        ];

        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $reschedule = [
            'interview_date' => $request->post('interview_date'),
            'interview_time' => $request->post('interview_time')
        ];

        Interview::where('id', $id)->update($reschedule);

        return redirect('/interview/view/' . $id);
    }

    public function cancel(Request $request, $id){
        Interview::where('id', $id)->update(['is_active' => 0]);
        return redirect('/interview');
    }

    public function schedule(Request $request){
        $rules = [
            'applicant_id' => 'required',
            'job_id' => 'required',
            'interview_date' => 'required',
            'interview_time' => 'required',
            'interviewers' => 'required',
            'interview_mode' => 'required'
        ];

        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $interviewers = implode(',', $request->interviewers);
        $data = $request->post();

        $data['interviewers'] = $interviewers;
        $request->merge($data);
        unset($data['_token']);

        $interview = new Interview();
        $interview->fill($data);
        $interview->is_active = 1;
        $interview->save();


        return redirect('/interview');
    }

    public function applicantNameList(Request $request){
        $applicantData = Interview::select('applicant_id')->distinct()->get();
        $applicant_id = [];
        $applicant_name = [];

        foreach ($applicantData as $key => $value){
            array_push($applicant_id, $value['applicant_id']);
            array_push($applicant_name, getApplicantDetails($value['applicant_id'])->applicant_name);
        }
        return response()->json(['applicant_id' => $applicant_id, 'applicant_name' => $applicant_name]);
    }

    public function getJobsList(Request $request, $id){
        $job_data = Interview::where('applicant_id', $id)->select('job_id')->distinct()->get();
        $job_id = [];
        $job_title = [];

        foreach ($job_data as $id){
            array_push($job_id, getJobDetails($id['job_id'])->id);
            array_push($job_title, getJobDetails($id['job_id'])->job_title);
            // return response(getJobDetails($id['job_id'])->job_title);
        }
        return response()->json(['job_id' => $job_id, 'job_title' => $job_title]);
    }
}
