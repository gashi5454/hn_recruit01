<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;


class ValidateRt extends Component
{
    public $name;
    public $kana;
    public $email;
    public $password;
    public $name_bands;
    public $kana_bands;
    public $audio_data;

    protected $rules = [
        'name' => 'required|string|max:100',
        'kana'  => 'required|string|max:100',
        'email'     => 'required|string|email|max:255|unique:users',
        'password'     => 'required|string|confirmed',
        'name_bands'     => 'string|max:100',
        'kana_bands'     => 'string|max:100',
        'audio_data'     => 'nullable|file|max:40960|mimes:mp3,m4a,wma,mpga,wav,mp4',
    ];

    protected $messages = [
        'name.required' => '代表者氏名を入力してください',
        'email.required' => 'メールアドレスを入力してください',
        'email.email' => 'この形式は無効です',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.validate-rt');
    }

    public function create(array $input)
    {
        if(isset($input['audio_data'])){
            $filename = $input['audio_data']->getClientOriginalName();
            $input['audio_data'] = $input['audio_data']->storeAs('public/audio_datas', $filename);
            //dd($applies['audio_data']);
            }

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
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
            'audio_data' => $input['audio_data'],
            'audio_url' => $input['audio_url'],
            'remarks' => $input['remarks'],
        ]);
    }
}
