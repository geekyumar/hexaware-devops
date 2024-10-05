<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index(Request $request){
        return view('profile', ['profile' => Profile::where('id', auth()->user()->id)->first()]);
    }

    public function update(Request $request){
        $data = [
            'name' => $request->post('name'),
            'about' => $request->post('about'),
            'skills' => $request->post('skills'),
            'education_details' => $request->post('education_details'),
        ];

        Profile::where('id', auth()->user()->id)->update($data);
        return redirect('/profile');
    }
}
