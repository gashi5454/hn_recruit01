<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailSendController extends Controller
{

    public function send(){

        $data = [];
        //send('viewの名前' , $viewに渡す変数)
        Mail::send('emails.eventers', $data, function($message){
            $message->to('hn1012hn@gmail.com', 'Test')
            ->from('hnca1012@gmail.com','Reffect')
            ->subject('This is a test mail');
        });
    }

}
