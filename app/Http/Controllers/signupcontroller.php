<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class signupcontroller extends Controller
{
    public function signup(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirmPassword' => 'required'
        ];
        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json($validate->errors());
        }
        $userdetails = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->post('role'),
            'password' => Hash::make($request->password)
        ]);
        if(!$userdetails){
            return redirect()->back()->withErrors(['message' => 'Signup failed!']);
        }
        return redirect()->back()->withErrors(['message' => 'Signup done!']);
    }
}
