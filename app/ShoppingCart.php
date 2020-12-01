<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function shoppingCartItems(){
        return $this->hasMany('App\ShoppingCartItem');
    }
}
