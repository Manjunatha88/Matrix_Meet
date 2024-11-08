<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use  Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    public function index()
    {

        if(Auth::id()){
            
            $usertype=Auth()->user()->usertype;

            if($usertype=='user'){
                return view('user.userhome');
            }
            else if($usertype=='admin'){
                return view('admin.adminhome');
            }
            else if($usertype=='institute'){
                return view('Institute.institutehome');
            }
            else if($usertype=='faculty'){
                return view('Faculty.facultyhome');
            }
            else{
                return redirect()->back();
            }
        }
    }
}
