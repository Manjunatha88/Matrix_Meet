<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting; // Ensure this is the correct model
use App\Models\Schedule;
use Illuminate\Support\Facades\Log; // Import Log facade

class ScheduleController extends Controller
{
    public function index()
    {
        // Fetch all meetings from Meeting model
        $meetings = Meeting::all();
        return response()->json(['meetings' => $meetings]);
    }

    public function store(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'meeting_title' => 'required|string|max:255',
                'meeting_date' => 'required|date',
                'meeting_time' => 'required|date_format:H:i',
                'meeting_id' => 'required|string|max:255',
                'institutions' => 'required|string|max:255', // Ensure this matches the request field
                'additional_notes' => 'nullable|string',
            ]);

            // Create new meeting
            $meeting = new Meeting();
            $meeting->meeting_title = $request->meeting_title;
            $meeting->meeting_date = $request->meeting_date;
            $meeting->meeting_time = $request->meeting_time;
            $meeting->meeting_id = $request->meeting_id;
            $meeting->institutions = $request->institutions; // Ensure this matches the request field
            $meeting->additional_notes = $request->additional_notes;

            if ($meeting->save()) {
                return response()->json(['message' => 'Meeting added successfully', 'meeting' => $meeting], 201);
            } else {
                return response()->json(['message' => 'Failed to add meeting'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Error storing meeting: '.$e->getMessage()); // Log the error message
            return response()->json(['message' => 'An error occurred while adding the meeting'], 500);
        }
    }

    public function meeting_history()
    {
        // Fetch all schedules for history
        try {
            $schedule = Schedule::all();

            if (request()->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Schedule data fetched successfully',
                    'schedule' => $schedule,
                ]);
            } else {
                return view('admin.meetinghistory', compact('schedule'));
            }
        } catch (\Exception $e) {
            Log::error('Error fetching meeting history: '.$e->getMessage());
            return response()->json(['message' => 'An error occurred while fetching meeting history'], 500);
        }
    }
}