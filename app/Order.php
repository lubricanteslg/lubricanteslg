<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function client() {
        return $this->belongsTo('App\Client');
    }

    public function detail() {
        return $this->hasMany('App\OrderDetail');
    }

    public function salesman() {
        return $this->belongsTo('App\Salesman');
    }
}
