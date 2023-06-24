<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index($email)
    {
        $mailData = [
            'title' => 'Mail from Wasted to wanted',
            'body' => 'thank you for trusting us! you command status is: in shipping!'
        ];

        Mail::to($email)->send(new DemoMail($mailData));
        return redirect()->route('admin.commandes.history');
    }
}
