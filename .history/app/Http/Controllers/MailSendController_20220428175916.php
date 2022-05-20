<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendTestMail;
use Mail;

class MailSendController extends Controller
{

    public function send(){

        $to = [
            [
                'email' => 'hn1012hn@gmail.com',
                'name' => 'Test',
            ]
        ];

        Mail::to($to)->send(new SendTestMail());

        }

}
