<?php

use App\Models\Jobs;
use App\Models\JobApplications;
use App\Models\Interview;

function getJobDetails($id) {
    $job = Jobs::where('id', $id)->first();
    return $job;
}

function getApplicantDetails($id) {
    $job = JobApplications::where('id', $id)->first();
    return $job;
}

function interviewInProgressCount(){
    return JobApplications::where('is_hired', 0)->where('is_rejected', 0)->count();
}

function interviewHiredCount(){
    return JobApplications::where('is_hired', 1)->count();
}

function interviewRejectedCount(){
    return JobApplications::where('is_rejected', 1)->count();
}

function getJobsCount() {
    $job = Jobs::count();
    return $job;
}

function hello(){
    echo 'hello';
}