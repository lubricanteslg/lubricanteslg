<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use LocalDates;
    
    public function department() {
        return $this->belongsTo('App\Department');
    }
}
