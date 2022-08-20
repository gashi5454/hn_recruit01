<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SendFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','string','max:100'],
            'kana' => ['required','string','max:100'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required','string','confirmed'],
            'name_bands' => ['nullable','string','max:100'],
            'kana_bands' => ['nullable','string','max:100'],
            'audio_data' => ['nullable','file','max:40960','mimes:mp3,m4a,wma,mpga,wav,mp4'],
        ];
    }
    /*
    public function attributes()
    {
        return [
            'name.required' => ':attribute の入力をお願いします',
            'email.required' => ':attribute  の入力をお願いします',
        ];
    }
    */
}
