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
        $eventers_email = $request->input('eventers_email');
        return view('applies')->with([
            //'currentUrl' => $currentUrl,
            'appear_date' => $appear_date,
            'title' => $title,
            'genre' => $genre,
            'place' => $place,
            'eventers_email' => $eventers_email,
        ]);
    }

    public function store(Request $request)
    {

        // バリデーションルール
        $checkAppliesError = request()->validate([
            'name'=>'required|max:100',
            'kana'=>'required|max:100',
            'name_bands'=>'required|max:150',
            'kana_bands'=>'required|max:150',
            'email'=>'required|max:255',
            'audio_data'=>'audio_data'
        ]);

        // 音源ファイルの保存場所指定
        if(request('audio_data')){
            $filename = request()->file('audio_data')->getClientOriginalName();
            $inputs['audio_data'] = request('audio_data')->storeAs('public/audio_datas', $filename);
        }

        // postを保存
        $applies->create($inputs);
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
