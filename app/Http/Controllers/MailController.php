<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Services\SendGridService;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $to = $request->input("email");
        $subject = $request->input("object");
        $message = $request->input("message");
    
        Mail::raw($message, function ($mail) use ($to, $subject) {
            $mail->to($to)->subject($subject);
        });
    
        return response()->json(['message' => 'Email sent successfully']);
    }
}