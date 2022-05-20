<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadBandsAudio()
    {
        return view('uploadBandsAudio');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
