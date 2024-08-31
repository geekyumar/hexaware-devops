<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([\App\Http\Middleware\IsAuthenticated::class])->group(function(){
    Route::get('/', function () {
    return view('dashboard');
});

Route::get('/jobs/create', function(){
    return view('jobs.create');
});
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

