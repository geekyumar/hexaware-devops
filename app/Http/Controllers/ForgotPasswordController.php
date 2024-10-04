<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ForgotPassword;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class ForgotPasswordController extends Controller
{
    public function view(Request $request){
        return view('auth.forgot-password');
    }

    public function generateLink(Request $request){
        $mailIsValid = Validator::make($request->post(),[
            'email' => 'required|email'
        ]);

        if($mailIsValid->fails()){
            return response()->json(['error' => 'The mail is invalid!'], 500);
        }

        $userDetails = User::where('email', $request->email)->first();
        if(!$userDetails){
            return redirect()->back()->withErrors(['message' => 'User Not Found!']);
        }

        $token = Str::random(128);

        $saveToken = ForgotPassword::create([
            'user_id' => $userDetails->id,
            'email' => $userDetails->email,
            'reset_id' => $token,
            'is_clicked' => 1,
            'is_used' => 0
        ]);
        
        if(!$saveToken){
            return response()->json(['error' => 'error saving token to db!'], 500);
        }

        $mail_content = "Hi, $userDetails->email!
        You have raised a password recovery request to change your password.
        Here is the reset link.
        
        <a href=\"" . url('/password_reset?reset_id=' . urlencode($token)) . "\">Click here</a> to reset your password.
        
        Thank you!";

        $m = Mail::raw($mail_content, function ($message) use ($userDetails) {
        $message->to($userDetails->email)
            ->subject('Password Recovery Request');
        });

        if($m){
            return redirect()->back()->withErrors(['message' => 'Password recovery link sent to your email!']);
        } else {
            return redirect()->back()->withErrors(['message' => 'Failed in sending recovery mail. please try again.']);
        }
    }

    public function verifyToken(Request $request){
        $token = $request->input('reset_id');
        $userDetails = ForgotPassword::where('reset_id', $token)->where('is_used', 0)->first();

        if(!$userDetails){
            return response()->json(['error' => 'token invalid'], 500);
        }

        $data = [
            'email' => $userDetails->email,
        ];

        return view('auth.reset-password', $data);
    }

    public function resetPassword(Request $request){
        $token = $request->post('reset_id');
        $userData = ForgotPassword::where('reset_id', $token)->where('is_used', 0)->first();

        if(!$userData){
            return response()->json(['error' => 'token invalid'], 500);
        }

        if($request->password == $request->confirm_password){
            $updatePassword = User::where('id', $userData->user_id)->where('email', $userData->email)->first()->update(['password' => Hash::make($request->password)]);
            if(!$updatePassword){
                return response()->json(['error' => 'update password failed!'], 500);
            }
            ForgotPassword::where('reset_id', $token)->update(['is_used' => 1]);
            return response()->json(['message' => 'password updated successfully!']);
        } else {
            return response()->json(['error' => 'confirm password mismatch!'], 500);
        }

    }
}
