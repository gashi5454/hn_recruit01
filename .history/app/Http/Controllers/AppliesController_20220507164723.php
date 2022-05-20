<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Applie;

class AppliesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        //$currentUrl = url()->current();
        $appear_date = $request->input('appear_date');
        $title = $request->input('title');
        $genre = $request->input('genre');
        $place = $request->input('place');
        $eventers_email = $request->input('email');
        return view('applies')->with([
            //'currentUrl' => $currentUrl,
            'appear_date' => $appear_date,
            'title' => $title,
            'genre' => $genre,
            'place' => $place,
            'eventers_email' => $eventers_email,
        ]);
    }

    /*
    public function insertUserApplies(Request $request)
    {
        $keyword = $request->input('keyword');
        $appear_date_start = $request->input('appear_date_start');
        $appear_date_end = $request->input('appear_date_end');
        $address = $request->input('address');
        $genre = $request->input('genre');
        $applies = \App\Models\Applie::create(['name' => 'Flight 10']);
    }
    */

}
