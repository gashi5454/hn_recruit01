<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendOffersMail;
use Illuminate\Support\Facades\Mail;

class MailSendController extends Controller
{

    public function send_offers(){

        $to = [
            [
                'email' => 'hn1012hn@gmail.com',
                'name' => 'Test',
            ]
        ];

        Mail::to($to)->send(new SendOffersMail());

        return redirect(route('send_completed'));

        }

    public function send_completed()
    {
        return view('send_completed');
    }

    public function sendMail()
    {
        // Mail::sendで送信できる.
        // 第1引数に、テンプレートファイルのパスを指定し、
        // 第2引数に、テンプレートファイルで使うデータを指定する
        Mail::send('emails.user_applies', [
            "message" => "こんにちは！"

        ], function($message) {

            // 第3引数にはコールバック関数を指定し、
            // その中で、送信先やタイトルの指定を行う.
            $message
                ->to('hn1012hn@gmail.com')
                ->bcc('hnca1012@gmail.com')
                ->subject("応募完了のお知らせ");
        });
    }

}
