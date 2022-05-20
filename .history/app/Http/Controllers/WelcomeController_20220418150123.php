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
        $prefs = config('pref');
        $genres = config('genre');
        return view('welcome')->with(['prefs' => $prefs, 'genres' => $genres]);
    }

}
