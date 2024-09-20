<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request){
        return view('applications.index');
    }

    public function list(Request $request){
        return view('applications.list');
    }

    public function view(Request $request){
        return view('applications.view');
    }

    public function listNotifications(Request $request){
        return view('applications.notifications');
    }
}
