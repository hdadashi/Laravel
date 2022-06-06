<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function sendFeedback(Request $request) {
        
        $clientMessage = filter_var($request->message, FILTER_SANITIZE_SPECIAL_CHARS); 

        DB::table("client_messages")->insert([
            "from" => $request->email,
            "message" => $clientMessage
        ]);         

        return redirect()->back()->with("message", "Agradecemos seu feedback");
    }
}
