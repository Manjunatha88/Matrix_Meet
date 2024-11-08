<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Faculty;

class FacultyController extends Controller
{
    //
    public function viewfaculty(){
       return view('institute.viewfaculty'); 
    }
    
    public function addFaculty(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'college_code' => 'required|string',
            'college_name' => 'required|string',
            'faculty_name' => 'required|string',
            'faculty_bioid' => 'required|string',
            'faculty_email' => 'required|string|email',
            'faculty_phone' => 'required|string',
            'password' => 'required|string|min:8',
            'usertype' => 'required|string'
        ]);
    
        // Create a new Faculty instance
        $faculty = new Faculty;
        $faculty->college_code = $request->college_code;
        $faculty->college_name = $request->college_name;
        $faculty->faculty_name = $request->faculty_name;
        $faculty->faculty_bioid = $request->faculty_bioid;
        $faculty->faculty_email = $request->faculty_email;
        $faculty->faculty_phone = $request->faculty_phone;
        $faculty->password = $request->password; // Encrypt the password
        $faculty->usertype = $request->usertype;
        $faculty->save();
    
        // Create a new User instance
        $user = new User;
        $user->name = $request->faculty_name; 
        $user->email = $request->faculty_email;
        $user->password = bcrypt($request->password); // Encrypt password
        $user->usertype = $request->usertype;
        $user->save();
    
        // Return a JSON response with the user data
        return response()->json([
            'success' => true,
            'message' => 'Faculty added successfully',
            'data' => $faculty
        ], 200);
    }
    
    
    public function showfaculty()
    {
        $faculty = Faculty::all();
    
        if (request()->expectsJson()) {
            
            return response()->json([
                'success' => true,
                'message' => 'Faculty data fetched successfully',
                'faculty' => $faculty,
            ]);
        } else {
            return view('institute.showfaculty', compact('faculty'));
        }
    }  

    public function delete_faculty($id)
    {
        $faculty=Faculty::find($id);
        if($faculty)
        {
            $faculty->delete();
            return response()->json([
                'success'=>200,
                'message'=>'Faculty delete successfully'
            ]);
        }else
        {
            return response()->json([
                'success'=>404,
                'message'=>'No Faculty Found'
            ]);
        }
    }

}