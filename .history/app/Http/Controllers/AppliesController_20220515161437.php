<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Applie;
use App\Http\Controllers\MailSendController;

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

        $applies = [
            'name' => $request->input('name'),
            'kana' => $request->input('kana'),
            'name_bands' => $request->input('name_bands'),
            'kana_bands' => $request->input('kana_bands'),
            'tel' => $request->input('tel'),
            'emai' => $request->input('email'),
            'other_contact' => $request->input('other_contact'),
            'tel' => $request->input('tel'),
            'genre' => $request->input('genre'),
            'composition' => $request->input('composition'),
            'audio_data' => $request->input('audio_data'),
            'remarks' => $request->input('remarks'),
            'appear_date' => $request->input('appear_date'),
            'title' => $request->input('title'),
            'eventers_genre' => $request->input('eventers_genre'),
            'place' => $request->input('place'),
        ];

        $offers = [
            //'currentUrl' => $currentUrl,
            'name' => $request->input('name'),
            'appear_date' => $request->input('appear_date'),
            'title' => $request->input('title'),
            'eventers_genre' => $request->input('eventers_genre'),
            'place' => $request->input('place'),
        ];

        // ???????????????????????????????????????
        if(request('audio_data')){
            $filename = request()->file('audio_data')->getClientOriginalName();
            $inputs['audio_data'] = request('audio_data')->storeAs('public/storage/audio_datas', $filename);
        }

        static::create($applies);

        //return redirect(route('mail_offers' , $offers));
    }

    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:100'],
            'kana' => ['required', 'string', 'max:100'],
            'name_bands' => ['required', 'string', 'max:100'],
            'kana_bands' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ])->validate();

        return Applie::create([
            'name' => $input['name'],
            'kana' => $input['kana'],
            'name_bands' => $input['name_bands'],
            'kana_bands' => $input['kana_bands'],
            'email' => $input['email'],
            'tel' => $input['tel'],
            'other_contact' => $input['other_contact'],
            'vo_num' => $input['vo_num'],
            'vo_inst' => $input['vo_inst'],
            'elgt_num' => $input['elgt_num'],
            'elgt_mic' => $input['elgt_mic'],
            'acgt_type' => $input['acgt_type'],
            'acgt_num' => $input['acgt_num'],
            'acgt_mic' => $input['acgt_mic'],
            'elba_num' => $input['elba_num'],
            'elba_mic' => $input['elba_mic'],
            'acba_type' => $input['acba_type'],
            'acba_num' => $input['acba_num'],
            'acba_mic' => $input['acba_mic'],
            'dr_num' => $input['dr_num'],
            'dr_mic' => $input['dr_mic'],
            'key_num' => $input['key_num'],
            'key_mic' => $input['key_mic'],
            'other_part_num' => $input['other_part_num'],
            'other_mic' => $input['other_mic'],
            'genre' => $input['genre'],
            'audio_data' => $input['audio_data'],
            'audio_url' => $input['audio_url'],
            'remarks' => $input['remarks'],
        ]);
    }

}
