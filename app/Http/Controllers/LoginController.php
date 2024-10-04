<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function login(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        // $m = Mail::raw('This is a test email from Brevo SMTP', function ($message) {
        //     $message->to('umar.farooq.000000001@gmail.com')
        //             ->subject('Test Email');
        // });

        // if($m){
        //     return response()->json('success');
        // } else {
        //     return response()->json('fail');
        // }

        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/');
        } else {
            return redirect()->back()->withErrors(['message' => 'Login Failed!']);
        }
    }
}
