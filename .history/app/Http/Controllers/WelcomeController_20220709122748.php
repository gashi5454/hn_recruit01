<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;

class WelcomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $keyword = "";
        $appear_date_start = "";
        $appear_date_end = "";
        $address = "";
        $genre = "";

        session(['url.intended' => url()->current()]);

        if (session()->has('url.intended')) {
            $currentUrl = session('url.intended');
        }

        return view('welcome')->with([
            'currentUrl' => $currentUrl,
            'keyword' => $keyword,
            'appear_date_start' => $appear_date_start,
            'appear_date_end' => $appear_date_end,
            'address' => $address,
            'genre' => $genre,
        ]);
    }

}
