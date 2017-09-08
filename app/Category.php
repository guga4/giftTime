<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function giftCards()
    {
        return $this->belongsToMany('App\GiftCards','gift_card_category','category_id','gift_card_id');
    }
}
