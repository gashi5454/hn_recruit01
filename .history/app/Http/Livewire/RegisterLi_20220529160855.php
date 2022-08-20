<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterLi extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $image;
    public $photoStatus = true;

    protected $rules = [
        'firstname' => 'required|min:3',
        'lastname'  => 'required|min:3',
        'email'     => 'required|email',
        'phone'     => 'required',
        'image'     => 'image|max:1024|mimes:jpeg,png,jpg,gif',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
