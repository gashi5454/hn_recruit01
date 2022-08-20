<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;

class Offer extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Sortable;

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
        'detail_photo',
        'genre',
        'appear_date',
        'number_of_bands',
        'contents',
        'place',
        'tel',
        'other_contact',
        'address',
        'postal_code',
        'capacity',
        'quota',
        'requirement',
        'created_at',
    ];

	public $sortable = [
        'id',
        'appear_date',
        'genre',
        'address',
    ];

    public $sortableAs = [
        'ad_up',
        'ad_down',
    ];

    public function appearDateUpSortable($query, $direction)
    {
        $direction = 'asc';
        return $query->orderBy('ad_up', $direction);
    }

    public function appearDateDownSortable($query, $direction)
    {
        $direction = 'desc';
        return $query->orderBy('ad_down', $direction);
    }

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
    ];

    protected $guarded = [];

    //protected $table = 'eventer_offers';

    public function eventers() {
        return $this->belongsTo(Eventer::class);
    }

    public function applies() {
        return $this->hasMany(Applie::class);
    }
}
