<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path',
        'kana',
        'name_bands',
        'kana_bands',
        'tel',
        'other_contact',
        'vo_num',
        'vo_inst',
        'vo_inst_other',
        'elgt_num',
        'elgt_mic',
        'acgt_type',
        'acgt_num',
        'acgt_mic',
        'elba_num',
        'elba_mic',
        'acba_type',
        'acba_num',
        'acba_mic',
        'dr_num',
        'dr_mic',
        'key_num',
        'key_mic',
        'other_part_num',
        'other_mic',
        'genre',
        'audio_data',
        'audio_url',
        'remarks',
        'created_at',
        'updated_at',
        'quit_at',
        'return_at',
        'login_status',
        'account_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

}
