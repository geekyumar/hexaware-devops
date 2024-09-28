<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplications;
use App\Models\Notifications;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    public function index(Request $request){
        return view('applications.index', ['jobApplications' => JobApplications::all()]);
    }

    public function list(Request $request){
        return view('applications.list', ['jobApplications' => JobApplications::all()]);
    }

    public function view(Request $request, $id){
        $jobApplication = JobApplications::where('id', $id)->first();
        return view('applications.view', ['jobApplication' => $jobApplication]);
    }

    public function update(Request $request, $id){
        $rules = [
            'application_status' => 'required',
            'notes' => 'required'
        ];

        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()]);
        }

        $update = [
            'application_status' => $request->post('application_status'),
            'notes' => $request->post('notes')
        ];
        Jobapplications::where('id', $id)->update($update);
        return redirect('/applications');
    }

    public function rejectApplication(Request $request, $id){
        JobApplications::where('id', $id)->first()->update(['application_status' => 'Rejected']);
        return redirect('/applications');
    }

    public function listNotifications(Request $request){
        return view('applications.notifications', ['notifications' => Notifications::all()]);
    }

    public function markAsRead(Request $request, $id){
        Notifications::where('id', $id)->update(['is_read' => 1]);
        return redirect('/applications/notifications');
    }

    public function deleteNotification(Request $request, $id){
        Notifications::where('id', $id)->delete();
        return redirect('/applications/notifications');
    }
}
