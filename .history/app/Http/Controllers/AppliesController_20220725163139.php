<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Applie;
use App\Mail\SendAppliesMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AppliesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        session(['url.intended' => url()->current()]);

        if (session()->has('url.intended')) {
            $currentUrl = session('url.intended');
        }
        $offer_id = $request->input('offer_id');
        $appear_date = $request->input('appear_date');
        $title = $request->input('title');
        $eventer_genre = $request->input('eventer_genre');
        $place = $request->input('place');
        $eventer_id = $request->input('eventer_id');
        $eventer_email = $request->input('eventer_email');
        return view('applies')->with([
            'currentUrl' => $currentUrl,
            'offer_id' => $offer_id,
            'appear_date' => $appear_date,
            'title' => $title,
            'eventer_genre' => $eventer_genre,
            'place' => $place,
            'eventer_id' => $eventer_id,
            'eventer_email' => $eventer_email,
        ]);
    }

    public function confirm_applies(Request $request)
    {
        $applies = [
            'name' => $request->input('name'),
            'kana' => $request->input('kana'),
            'name_bands' => $request->input('name_bands'),
            'kana_bands' => $request->input('kana_bands'),
            'email' => $request->input('email'),
            'tel' => $request->input('tel'),
            'other_contact' => $request->input('other_contact'),
            'vo_num' => $request->input('vo_num'),
            'vo_inst' => $request->input('vo_inst'),
            'vo_inst_other' => $request->input('vo_inst_other'),
            'elgt_num' => $request->input('elgt_num'),
            'elgt_mic' => $request->input('elgt_mic'),
            'acgt_type' => $request->input('acgt_type'),
            'acgt_num' => $request->input('acgt_num'),
            'acgt_mic' => $request->input('acgt_mic'),
            'elba_num' => $request->input('elba_num'),
            'elba_mic' => $request->input('elba_mic'),
            'acba_type' => $request->input('acba_type'),
            'acba_num' => $request->input('acba_num'),
            'acba_mic' => $request->input('acba_mic'),
            'dr_num' => $request->input('dr_num'),
            'dr_mic' => $request->input('dr_mic'),
            'key_num' => $request->input('key_num'),
            'key_mic' => $request->input('key_mic'),
            'other_part_num' => $request->input('other_part_num'),
            'other_mic' => $request->input('other_mic'),
            'genre' => $request->input('genre'),
            'audio_data_path' => $request->file('audio_data'),
            'audio_data_name' => $request->input('audio_data'),
            'audio_url' => $request->input('audio_url'),
            'remarks' => $request->input('remarks'),
            'appear_date' => $request->input('appear_date'),
            'title' => $request->input('title'),
            'eventer_genre' => $request->input('eventer_genre'),
            'place' => $request->input('place'),
            'eventer_id' => $request->input('eventer_id'),
            'eventer_email' => $request->input('eventer_email'),
            'user_id' => $request->input('user_id'),
            'offer_id' => $request->input('offer_id'),
        ];

        Validator::make($applies, [
            'name' => ['required', 'string', 'max:100'],
            'kana' => ['required', 'string', 'max:100'],
            'name_bands' => ['required', 'string', 'max:100'],
            'kana_bands' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ])->validate();

        // 音源ファイルアップ時のみ保存場所指定処理行う
        if(isset($applies['audio_data_path']))
        {
            //元のファイル名を取得
            $originalFileName = $request->file('audio_data')->getClientOriginalName();

            //ファイル保存・パス格納
            $uniqueFileName = $request->file('audio_data')->store('public/audio_tmp');
            $applies['audio_data_path'] = $uniqueFileName;
            $applies['audio_data_name'] = $originalFileName;
        }

        return view('confirm_applies')->with([
            'applies' => $applies,
        ]);

    }

    public function store(Request $request)
    {
        $applies = [
            'name' => $request->input('name'),
            'kana' => $request->input('kana'),
            'name_bands' => $request->input('name_bands'),
            'kana_bands' => $request->input('kana_bands'),
            'email' => $request->input('email'),
            'tel' => $request->input('tel'),
            'other_contact' => $request->input('other_contact'),
            'vo_num' => $request->input('vo_num'),
            'vo_inst' => $request->input('vo_inst'),
            'vo_inst_other' => $request->input('vo_inst_other'),
            'elgt_num' => $request->input('elgt_num'),
            'elgt_mic' => $request->input('elgt_mic'),
            'acgt_type' => $request->input('acgt_type'),
            'acgt_num' => $request->input('acgt_num'),
            'acgt_mic' => $request->input('acgt_mic'),
            'elba_num' => $request->input('elba_num'),
            'elba_mic' => $request->input('elba_mic'),
            'acba_type' => $request->input('acba_type'),
            'acba_num' => $request->input('acba_num'),
            'acba_mic' => $request->input('acba_mic'),
            'dr_num' => $request->input('dr_num'),
            'dr_mic' => $request->input('dr_mic'),
            'key_num' => $request->input('key_num'),
            'key_mic' => $request->input('key_mic'),
            'other_part_num' => $request->input('other_part_num'),
            'other_mic' => $request->input('other_mic'),
            'genre' => $request->input('genre'),
            'audio_data_path' => $request->input('audio_data_path'),
            'audio_data_name' => $request->input('audio_data_name'),
            'audio_url' => $request->input('audio_url'),
            'remarks' => $request->input('remarks'),
            'appear_date' => $request->input('appear_date'),
            'title' => $request->input('title'),
            'eventer_genre' => $request->input('eventer_genre'),
            'place' => $request->input('place'),
            'eventer_id' => $request->input('eventer_id'),
            'eventer_email' => $request->input('eventer_email'),
            'user_id' => $request->input('user_id'),
            'offer_id' => $request->input('offer_id'),
        ];

        $offers = [
            //'currentUrl' => $currentUrl,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'appear_date' => $request->input('appear_date'),
            'title' => $request->input('title'),
            'eventer_genre' => $request->input('eventer_genre'),
            'place' => $request->input('place'),
            'eventer_id' => $request->input('eventer_id'),
            'eventer_email' => $request->input('eventer_email'),
            'user_id' => $request->input('user_id'),
            'offer_id' => $request->input('offer_id'),
        ];

        //ユーザーメール宛先
        $toUser = [
            [
                'email' => $request->input('email'),
                'name' => 'Test',
            ]
        ];

        if(isset($applies['audio_data_path']))
        {
            $pathLess = str_replace('public/audio_tmp', '', $applies['audio_data_path']);
            Storage::move(
                'public/audio_tmp' . $pathLess , 'public/audio_data' . $pathLess
            );
        }

        static::create($applies);

        Mail::to($toUser)->send(new SendAppliesMail($offers));

        return view('emails.send_completed');

        //return redirect(route('send_completed' , ['offers' => $offers,]));
    }

    public function create(array $input)
    {
        return Applie::create([
            'user_id' => $input['user_id'],
            'eventer_id' => $input['eventer_id'],
            'offer_id' => $input['offer_id'],
            'name' => $input['name'],
            'kana' => $input['kana'],
            'name_bands' => $input['name_bands'],
            'kana_bands' => $input['kana_bands'],
            'email' => $input['email'],
            'tel' => $input['tel'],
            'other_contact' => $input['other_contact'],
            'vo_num' => $input['vo_num'],
            'vo_inst' => $input['vo_inst'],
            'vo_inst_other' => $input['vo_inst_other'],
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
            'audio_data_path' => $input['audio_data_path'],
            'audio_data_name' => $input['audio_data_name'],
            'audio_url' => $input['audio_url'],
            'remarks' => $input['remarks'],
        ]);
    }

}
