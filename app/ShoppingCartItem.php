<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCartItem extends Model
{
    public function shoppingCart(){
        return $this->belongsTo("App\ShoppingCart");
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
