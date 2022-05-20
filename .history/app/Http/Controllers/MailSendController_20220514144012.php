<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendOffersMail;
use App\Mail\SendAppliesMail;
use Illuminate\Support\Facades\Mail;

class MailSendController extends Controller
{

    public function mail_offers(Request $request){

        $name = $request->input('name');
        /*
        $kana = $request->input('kana');
        $name_bands = $request->input('name_bands');
        $kana_bands = $request->input('kana_bands');
        $tel = $request->input('tel');
        $email = $request->input('email');
        $other_contact = $request->input('other_contact');
        $tel = $request->input('tel');
        $genre = $request->input('genre');
        $composition = $request->input('composition');
        $audio_data = $request->input('audio_data');
        $remarks = $request->input('remarks');*/

        $appear_date = $request->input('appear_date');
        $title = $request->input('title');
        $genre = $request->input('genre');
        $place = $request->input('place');
        //$eventers_email = $request->input('eventers_email');
        $offers = [
            //'currentUrl' => $currentUrl,
            'name' => $name,
            'appear_date' => $appear_date,
            'title' => $title,
            'genre' => $genre,
            'place' => $place,
        ];

        $to = [
            [
                'email' => 'hn1012hn@gmail.com',
                'name' => 'Test',
            ]
        ];

        Mail::to($to)->send(new SendAppliesMail($offers));

        return view('emails.send_completed');

        }

    public function send_completed()
    {
        return view('emails.send_completed');
    }

}
