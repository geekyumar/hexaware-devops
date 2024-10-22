<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware([\App\Http\Middleware\IsAuthenticated::class])->group(function(){
    Route::get('/', function () {
    return view('dashboard');
});

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});

Route::get('/jobs/create', function(){
    return view('jobs.create');
});

// Jobs Route

Route::get('/jobs/list', [App\Http\Controllers\JobController::class, 'list']);
Route::post('/jobs/create', [App\Http\Controllers\JobController::class, 'create']);
Route::get('/jobs/publish/{id}', [App\Http\Controllers\JobController::class, 'publish']);
Route::get('/jobs/unpublish/{id}', [App\Http\Controllers\JobController::class, 'unpublish']);
Route::get('/jobs/edit/{id}', [App\Http\Controllers\JobController::class, 'edit']);
Route::post('/jobs/edit/{id}', [App\Http\Controllers\JobController::class, 'update']);
Route::get('/jobs/delete/{id}', [App\Http\Controllers\JobController::class, 'delete']);

// Job Categories Route

Route::get('/job-categories', [App\Http\Controllers\JobCategoryController::class, 'index']);
Route::get('/job-categories/create', [App\Http\Controllers\JobCategoryController::class, 'createPage']);
Route::get('/job-categories/edit/{id}', [App\Http\Controllers\JobCategoryController::class, 'editPage']);
Route::post('/job-categories/edit/{id}', [App\Http\Controllers\JobCategoryController::class, 'edit']);
Route::get('/job-categories/delete/{id}', [App\Http\Controllers\JobCategoryController::class, 'delete']);
Route::post('/job-categories/create', [App\Http\Controllers\JobCategoryController::class, 'create']);


// Application Tracking Route

Route::get('/applications', [App\Http\Controllers\ApplicationController::class, 'index']);
Route::get('/applications/list', [App\Http\Controllers\ApplicationController::class, 'list']);
Route::get('/applications/view/{id}', [App\Http\Controllers\ApplicationController::class, 'view']);
Route::post('/applications/update/{id}', [App\Http\Controllers\ApplicationController::class, 'update']);
Route::get('/applications/reject/{id}', [App\Http\Controllers\ApplicationController::class, 'rejectApplication']);
Route::get('/applications/notifications', [App\Http\Controllers\ApplicationController::class, 'listNotifications']);
Route::get('/applications/notifications/markAsRead/{id}', [App\Http\Controllers\ApplicationController::class, 'markAsRead']);
Route::get('/applications/notifications/delete/{id}', [App\Http\Controllers\ApplicationController::class, 'deleteNotification']);

// Custom Reports Route

Route::get('/custom-reports', [App\Http\Controllers\CustomReportController::class, 'index']);
Route::post('/custom-reports/create',  [App\Http\Controllers\CustomReportController::class, 'create']);
Route::get('/custom-reports/create', function() { return view('custom-reports.create');});
Route::get('/custom-reports/view/{id}', [App\Http\Controllers\CustomReportController::class, 'view']);
Route::get('/custom-reports/edit/{id}',  [App\Http\Controllers\CustomReportController::class, 'editPage']);
Route::post('/custom-reports/edit/{id}',  [App\Http\Controllers\CustomReportController::class, 'edit']);
Route::get('/custom-reports/delete/{id}',  [App\Http\Controllers\CustomReportController::class, 'delete']);
Route::post('/custom-reports/create', [App\Http\Controllers\CustomReportController::class, 'create']);

// Application Forms Management Route

Route::get('/application-forms', [App\Http\Controllers\ApplicationFormController::class, 'index']);
Route::get('/application-forms/create', [App\Http\Controllers\ApplicationFormController::class, 'createPage']);
Route::get('/application-forms/add-field', function() { return view('application-forms.add-field');});

Route::post('/application-forms/create', [App\Http\Controllers\ApplicationFormController::class, 'create']);
Route::post('/application-forms/add-field', [App\Http\Controllers\ApplicationFormController::class, 'addField']);
Route::get('/application-forms/delete/{id}', [App\Http\Controllers\ApplicationFormController::class, 'delete']);
Route::get('/application-forms/edit/{id}', [App\Http\Controllers\ApplicationFormController::class, 'edit']);
Route::post('/application-forms/update/{id}', [App\Http\Controllers\ApplicationFormController::class, 'update']);

Route::get('/application-forms/editField/{id}', [App\Http\Controllers\ApplicationFormController::class, 'editFieldPage']);
Route::post('/application-forms/editField/{id}', [App\Http\Controllers\ApplicationFormController::class, 'editField']);
Route::get('/application-forms/deleteField/{id}', [App\Http\Controllers\ApplicationFormController::class, 'deleteField']);

// Interview Scheduling Routes

Route::get('/interview', [App\Http\Controllers\InterviewController::class, 'index']);
Route::get('/interview/schedule', [App\Http\Controllers\InterviewController::class, 'schedulingScreen']);
Route::post('/interview/schedule', [App\Http\Controllers\InterviewController::class, 'schedule']);
Route::get('/interview/view/{id}', [App\Http\Controllers\InterviewController::class, 'view']);
Route::get('/interview/reschedule/{id}', [App\Http\Controllers\InterviewController::class, 'rescheduleScreen']);
Route::post('/interview/reschedule/{id}', [App\Http\Controllers\InterviewController::class, 'reschedule']);
Route::get('/interview/cancel/{id}', [App\Http\Controllers\InterviewController::class, 'cancel']);
Route::post('/interview/schedule', [App\Http\Controllers\InterviewController::class, 'schedule']);

// Recruitment Metrics Dashboard

Route::get('/recruitment', [App\Http\Controllers\RecruitmentController::class, 'index']);
Route::get('/recruitment/details/{id}', [App\Http\Controllers\RecruitmentController::class, 'details']);
Route::get('/recruitment/updateStatus/{id}', [App\Http\Controllers\RecruitmentController::class, 'update']);
Route::post('/recruitment/updateStatus/{id}', [App\Http\Controllers\RecruitmentController::class, 'updateStatus']);

// Profile Routes

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update']);

// GenAI Integration Routes

Route::get('/application/summary/generate', [App\Http\Controllers\GenAIController::class, 'generateSummary']);


});

Route::post('/interview/applicantNameList', [App\Http\Controllers\InterviewController::class, 'applicantNameList'])->withoutMiddleware('web', 'csrf');
Route::post('/interview/jobsList/{id}', [App\Http\Controllers\InterviewController::class, 'getJobsList'])->withoutMiddleware('web', 'csrf');

// signup
Route::get('/signup', function(){
    return view('auth.signup');
});
Route::post('/register', [App\Http\Controllers\signupcontroller::class,'signup']);


//login
Route::get('/login', function(){
    return view('auth.login');
});
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);

// forgot password
Route::get('/forgot-password', [App\Http\Controllers\ForgotPasswordController::class, 'view']);
Route::post('/forgot-password/generate_password_link', [App\Http\Controllers\ForgotPasswordController::class, 'generateLink']);
Route::get('/password_reset', [App\Http\Controllers\ForgotPasswordController::class, 'verifyToken']);
Route::post('/password_reset', [App\Http\Controllers\ForgotPasswordController::class, 'resetPassword']);

