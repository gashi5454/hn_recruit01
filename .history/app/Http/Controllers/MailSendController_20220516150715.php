<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendOffersMail;
use App\Mail\SendAppliesMail;
use Illuminate\Support\Facades\Mail;

class MailSendController extends Controller
{

    public function send_applies_forUser($offers)
    {



        $offers = [
            'name' => $offers['name'],
            'email' => $offers['email'],
            'appear_date' => ['appear_date'],
            'title' => ['title'],
            'eventer_genre' => ['eventer_genre'],
            'place' => ['place'],
            'eventer_id' => ['eventer_id'],
            'eventer_email' => ['eventer_email'],
            'user_id' => ['user_id'],
            'offer_id' => ['offer_id'],
        ];

        $to = [
            [
                /*
                'email' => ['email'],
                'name' => 'Test',
                */
            ]
        ];

        Mail::to($to)->send(new SendAppliesMail($offers));

        return view('emails.send_completed');

        }

        public function send_applies_forEventers(Request $request)
        {
            //
        }

}
