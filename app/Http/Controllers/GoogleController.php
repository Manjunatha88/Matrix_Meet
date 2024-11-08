<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function meetingaction(){
        return view('admin.meetingaction');
    }

    public function meetingindex(){
        return view('admin.meetingindex');
    }
}
