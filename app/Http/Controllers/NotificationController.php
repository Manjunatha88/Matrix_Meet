<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function getMessages()
    {
        return view('admin.addnotification');
    }

    public function sendNotification(Request $request)
    {
        $validatedData = $request->validate([
            'message_title' => 'required|string|max:255',
            'message_body' => 'required|string',
        ]);

        try {
            // Store notification data in the database
            Notification::create([
                'message_title' => $validatedData['message_title'], // Ensure this matches your database column
                'message_body' => $validatedData['message_body'],   // Ensure this matches your database column
            ]);

            return response()->json(['success' => true, 'message' => 'Notification sent successfully!']);
        } catch (\Exception $e) {
            \Log::error('Error storing notification: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to send notification.'], 500);
        }
    }

    public function notification(Request $request)
    {
        // Retrieve all notifications from the database
        $notifications = Notification::all();

        if ($request->ajax() || $request->wantsJson()) {
            // Return notifications in JSON format for AJAX requests
            return response()->json(['notification' => $notifications]);
        }

        // Return the view with notifications for non-AJAX requests
        return view('Institute.notification', ['notifications' => $notifications]);
    }
}