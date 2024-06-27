<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendTestEmail()
    {
        $data = ['name' => "Test User"];
        Mail::send('emails.test', $data, function ($message) {
            $message->to('test@example.com', 'Test User')
                ->subject('Laravel Test Mail');
            $message->from('kthura397@gmail.com', 'First');
        });

        return "Email Sent!";
    }
}
