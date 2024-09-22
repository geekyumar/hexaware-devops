<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomReportController extends Controller
{
    public function index(Request $request){
        return view('custom-reports.index');
    }

    public function create(Request $request){
        
    }
}
