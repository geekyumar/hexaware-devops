<?php

use App\Models\Jobs;

function getJobDetails($id) {
    $job = Jobs::where('id', $id)->first();
    return $job;
}

function getJobsCount() {
    $job = Jobs::count();
    return $job;
}

function hello(){
    echo 'hello';
}