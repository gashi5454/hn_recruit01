<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ValidateRt extends Component
{
    use PasswordValidationRules;

    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $image;
    public $photoStatus = true;

    protected $rules = [
        'name' => 'required|string|max:100',
        'kana'  => 'required|string|max:100',
        'email'     => 'required|string|email|max:255|unique:users',
        'password'     => $this->passwordRules(),
        'name_bands'     => 'string|max:100',
        'kana_bands'     => 'string|max:100',
        'audio_data'     => 'file|max:40960|mimes:mp3,m4a,wma,mpga,wav,mp4',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.validate-rt');
    }
}
