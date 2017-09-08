<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function basketGiftCards()
    {
        return $this->hasMany('App\GiftCard','basket_user_id');
    }

    public function ratedGiftCards()
    {
        return $this->belongsToMany('App\GiftCard','ratings','user_id','gift_card_id')
                    ->withPivot('rate','createdAt');
    }

    public function boughtGiftCards()
    {
        return $this->belongsToMany('App\GiftCard','buys','user_id','gift_card_id')
                    ->withPivot('createdAt');
    }
}
