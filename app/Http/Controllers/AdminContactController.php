<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

// This class helps to gets latest message from database and pagination upto 20 message per page  
class AdminContactController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.contact-messages.index', compact('messages'));
    }
    // Aeuta message detail ma dekhaunxa 
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        
        // yesle Mark as read garxa
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.contact-messages.show', compact('message'));
    }
    // method ho jasle delete garda delete hunxa
    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.contact-messages.index')->with('success', 'Message deleted successfully.');
    }
}
