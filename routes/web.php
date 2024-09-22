<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

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


// Application Tracking Route

Route::get('/applications', [App\Http\Controllers\ApplicationController::class, 'index']);
Route::get('/applications/list', [App\Http\Controllers\ApplicationController::class, 'list']);
Route::get('/applications/view', [App\Http\Controllers\ApplicationController::class, 'view']);
Route::get('/applications/notifications', [App\Http\Controllers\ApplicationController::class, 'listNotifications']);

// Custom Reports Route

Route::get('/custom-reports', [App\Http\Controllers\CustomReportController::class, 'index']);
Route::get('/custom-reports/create', function() { return view('custom-reports.create');});
Route::get('/custom-reports/view', function() { return view('custom-reports.view');});
Route::get('/custom-reports/edit', function() { return view('custom-reports.edit');});
Route::post('/custom-reports/create', [App\Http\Controllers\CustomReportController::class, 'create']);

});

// signup
Route::get('/signup', function(){
    return view('signup');
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

