<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailSendController extends Controller
{

    public function send(){

        $data = [];

        Mail::send('emails.test', $data, function($message){
            $message->to('hnca1012@gmail.com', 'Test')
            ->subject('This is a test mail');
        });
    }

}
