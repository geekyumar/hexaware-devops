<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplications;
use App\Models\ApplicationStatus;
use Illuminate\Support\Facades\Validator;

class RecruitmentController extends Controller
{
    public function index(Request $request){
        if($request->input('start_date') and $request->input('end_date')){
            return view('recruitment-metrics.index', ['applications' => JobApplications::whereBetween('created_at', [$request->input('start_date'), $request->input('end_date')])->get()]);
        }
        return view('recruitment-metrics.index', ['applications' => JobApplications::all()]);
    }

    public function details(Request $request, $id){
        return view('recruitment-metrics.details', 
        [
            'application' => JobApplications::where('id', $id)->first(),
            'status' => ApplicationStatus::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function update(Request $request, $id){
        return view('recruitment-metrics.update-status', ['status' => JobApplications::where('id', $id)->first()]);
    }

    public function updateStatus(Request $request, $id){
        $rules = [
            'application_status' => 'required',
            'notes' => 'required',
        ];

        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        JobApplications::where('id', $id)->update([
            'application_status' => $request->post('application_status'),
            'notes' => $request->post('notes'),
            'is_hired' => 0,
            'is_rejected' => 0,

        ]);

        if( $request->post('application_status') == 'Hired'){
            JobApplications::where('id', $id)->update(['is_hired' => 1, 'is_rejected' => 0]);
        }

        if( $request->post('application_status') == 'Rejected'){
            JobApplications::where('id', $id)->update(['is_rejected' => 1, 'is_hired' => 0]);
        }
        
        ApplicationStatus::create([
            'application_id' => $id,
            'job_id' => getJobDetails(getApplicantDetails($id)->job_id)->id,
            'application_status' => $request->post('application_status'),
            'notes' => $request->post('notes')
        ]);

        return redirect('/recruitment/details/' . $id);
    }
}
