<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
    protected $table = 'gift_cards';

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function basketUser()
    {
        return $this->belongsTo('App\User','basket_user_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category','gift_card_category','gift_card_id','category_id');
    }

    public function ratedByUsers()
    {
        return $this->belongsToMany('App\User','ratings','gift_card_id','user_id')
                    ->withPivot('rate','createdAt');
    }

    public function boughtByUsers()
    {
        return $this->belongsToMany('App\User','buys','gift_card_id','user_id')
                    ->withPivot('createdAt');
    }
}
