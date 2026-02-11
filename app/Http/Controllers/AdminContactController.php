<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.contact-messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        
        // Mark as read
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.contact-messages.show', compact('message'));
    }

    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.contact-messages.index')->with('success', 'Message deleted successfully.');
    }
}
