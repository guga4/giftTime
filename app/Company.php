<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    public function giftCards()
    {
        return $this->hasMany('App\GiftCard','company_id');
    }

    
}
