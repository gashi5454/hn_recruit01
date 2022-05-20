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
            'appear_date' => $offers['appear_date'],
            'title' => $offers['title'],
            'eventer_genre' => $offers['eventer_genre'],
            'place' => $offers['place'],
            'eventer_id' => $offers['eventer_id'],
            'eventer_email' => $offers['eventer_email'],
            'user_id' => $offers['user_id'],
            'offer_id' => $offers['offer_id'],
        ];

        $to = [
            [
                'email' => $offers['email'],
                'name' => 'Test',
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
