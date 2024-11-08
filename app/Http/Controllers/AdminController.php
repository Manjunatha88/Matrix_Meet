<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule; // Ensure this is the correct model
use App\Models\Institute;

class AdminController extends Controller
{
    public function viewschedule()
    {
        $institute = Institute::all();
        return view('admin.viewschedule', compact('institute'));
    }

    public function schedulemeeting(Request $request)
    {
        // Validate the form data
        $request->validate([
            'meeting_title' => 'required|string|max:255',
            'meeting_date' => 'required|date',
            'meeting_time' => 'required',
            'institutions' => 'required|string|max:255', // Ensure this matches your form input
            'meeting_id' => 'required|string|max:255',
            'additional_notes' => 'nullable|string',
        ]);
    
        // Create a new Schedule instance
        $meeting = new Schedule();
        $meeting->meeting_title = $request->input('meeting_title');
        $meeting->meeting_date = $request->input('meeting_date');
        $meeting->meeting_time = $request->input('meeting_time');
        $meeting->institutions = $request->input('institutions'); // Correct field name
        $meeting->meeting_id = $request->input('meeting_id');
        $meeting->additional_notes = $request->input('additional_notes');
    
        if ($meeting->save()) {
            return response()->json(['success' => true, 'message' => 'Meeting scheduled successfully', 'meeting' => $meeting], 200);
        } else {
            return response()->json(['message' => 'Failed to add meeting'], 500);
        }
    }

    public function getmeeting(Request $request)
    {
        // Fetch all meetings from Schedule model
        $meetings = Schedule::all();

        if ($request->wantsJson()) {
            return response()->json(['meetings' => $meetings]);
        }

        return view('admin.schedulemeeting', compact('meetings'));
    }
}