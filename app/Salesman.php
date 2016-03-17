<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    use LocalDates;
    
    public function clients() {
        return $this->hasMany('App\Client');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
