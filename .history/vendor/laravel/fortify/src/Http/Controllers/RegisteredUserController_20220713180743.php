<?php

namespace Laravel\Fortify\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;

class RegisteredUserController extends Controller
{
    use PasswordValidationRules;

    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Show the registration view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\RegisterViewResponse
     */
    public function create(Request $request): RegisterViewResponse
    {
        return app(RegisterViewResponse::class);
    }

    /**
     * Create a new registered user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Contracts\CreatesNewUsers  $creator
     * @return \Laravel\Fortify\Contracts\RegisterResponse
     */
    public function store(Request $request,
                            CreatesNewUsers $creator): RegisterResponse
    {
        $input = [
            'name' => $request->input('name'),
            'kana' => $request->input('kana'),
            'name_bands' => $request->input('name_bands'),
            'kana_bands' => $request->input('kana_bands'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation'),
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
        ];

        Validator::make($input, [
            'name' => ['required', 'string', 'max:100'],
            'kana' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'name_bands' => ['nullable', 'string', 'max:100'],
            'kana_bands' => ['nullable', 'string', 'max:100'],
            'audio_data' => ['nullable', 'file', 'max:20480', 'mimes:mp3,m4a,wma,mpga,wav,mp4'],
        ])->validate();

        if(isset($input['audio_data_path']))
        {
            //元のファイル名を取得
            $audio_data_path = $request->file('audio_data')->store('public/audio_data');

            //ファイル保存・パス格納
            $audio_data_name = $request->file('audio_data')->getClientOriginalName();
            $audio = [
                'audio_data_path' => $audio_data_path,
                'audio_data_name' => $audio_data_name
            ];
        } else {
            $audio = '';
        }

        event(new Registered($user = $creator->create($request->all() , $audio)));

        $this->guard->login($user);

        return app(RegisterResponse::class);
    }
}
