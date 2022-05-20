<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendOffersMail;
use App\Mail\SendAppliesMail;
use Illuminate\Support\Facades\Mail;

class MailSendController extends Controller
{

    public function mail_offers(Request $request)
    {

        //$eventers_email = $request->input('eventers_email');
        $offers = [
            //'currentUrl' => $currentUrl,
            'name' => $request->input('name'),
            'appear_date' => $request->input('appear_date'),
            'title' => $request->input('title'),
            'genre' => $request->input('genre'),
            'place' => $request->input('place'),
        ];

        $to = [
            [
                'email' => $request->input('email'),
                'name' => 'Test',
            ]
        ];

        Mail::to($to)->send(new SendAppliesMail($offers));

        return view('emails.send_completed');

        }

}
