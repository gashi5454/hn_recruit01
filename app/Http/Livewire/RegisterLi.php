<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;


class RegisterLi extends Component
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
        'email.email' => 'この形式は無効です。〇〇〇@△△△の形式にしてください。',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.register-li');
    }
}
