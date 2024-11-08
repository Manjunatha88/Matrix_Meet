<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Institute;

class InstituteController extends Controller
{
    //
    public function viewinstitute(){
       return view('admin.viewinstitute'); 
    }
    
    public function addinstitute(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'institute_code' => 'required|string',
            'institude_name' => 'required|string',
            'institude_email' => 'required|string',
            'password' => 'required|string',
            'usertype' => 'required|string'
        ]);
    
        // Create a new User instance
        $user = new Institute;
        $user->institute_code = $request->institute_code;
        $user->institude_name = $request->institude_name;
        $user->institude_email =$request->institude_email; // Encrypt the password
        $user->password = $request->password;
        $user->usertype = $request->usertype;
        $user->save();

         // Create a new User instance
         $userdetails = new User;
         $userdetails->name = $request->institude_name; // Assuming there's a foreign key relationship
         $userdetails->email = $request->institude_email;
         $userdetails->password = bcrypt($request->password); // Encrypt password
         $userdetails->usertype = $request->usertype;
         $userdetails->save();
     
    
        // Return a JSON response with the user data
        return response()->json([
            'success' => true,
            'message' => 'insituite added successfully',
            'data' => $user
        ], 200);
    }
    
    public function showinstitute()
    {
        $institute = Institute::all();
    
        if (request()->expectsJson()) {
            
            return response()->json([
                'success' => true,
                'message' => 'Institute data fetched successfully',
                'institute' => $institute,
            ]);
        } else {
            return view('admin.showinstitute', compact('institute'));
        }
    }  

    public function delete_institute($id)
    {
        $institute=Institute::find($id);
        if($institute)
        {
            $institute->delete();
            return response()->json([
                'success'=>200,
                'message'=>'Institute delete successfully'
            ]);
        }else
        {
            return response()->json([
                'success'=>404,
                'message'=>'No institute Found'
            ]);
        }
    }
    
    public function getInstitutions()
    {
        $institutes = Institute::all(); // Adjust the query as needed
        return response()->json($institutes);
    }

}

 

