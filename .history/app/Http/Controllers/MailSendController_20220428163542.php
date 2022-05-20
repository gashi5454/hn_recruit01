<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailSendController extends Controller
{

    public function send(){

        $data = [];
        //send('viewの名前' , $viewに渡す変数)
        Mail::send('emails.test', $data, function($message){
            $message->to('hnca1012@gmail.com', 'Test')
            ->subject('This is a test mail');
        });
    }

}
