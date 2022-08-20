<?php

namespace App\Http\Livewire;

use Livewire\Component;

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
