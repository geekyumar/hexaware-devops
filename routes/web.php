<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', function(){
    return view('signup');
});
Route::post('/register', [App\Http\Controllers\signupcontroller::class,'signup']);
    

