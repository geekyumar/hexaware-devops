<?php

use App\Models\Jobs;
use App\Models\JobApplications;

function getJobDetails($id) {
    $job = Jobs::where('id', $id)->first();
    return $job;
}

function getApplicantDetails($id) {
    $job = JobApplications::where('id', $id)->first();
    return $job;
}

function getJobsCount() {
    $job = Jobs::count();
    return $job;
}

function hello(){
    echo 'hello';
}