<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images(){
        return $this->hasMany('App\Image');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function shoppingCartItems(){
        return $this->hasMany('App\ShoppingCartItem');
    }

    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }
}
