<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Offer extends Authenticatable
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
        'id',
        'eventer_id',
        'name',
        'title',
        'genre',
        'appear_date',
        'number_of_bands',
        'place',
        'tel',
        'other_contact',
        'address',
        'postal_code',
        'capacity',
        'quota',
        'requirement',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected $guarded = [];

    //protected $table = 'eventer_offers';

    public static function search(string $query)
    {
        $res = empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%');
        return $res;
    }

    /*
    public function eventersProfile() {
        //全データ取得
        $data = \App\Models\User::table('eventers')->get();
    }
    */

    public function eventers() {
        return $this->belongsTo(Eventer::class);
    }
}
