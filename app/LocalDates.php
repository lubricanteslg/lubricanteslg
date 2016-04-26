<?php
namespace App;

trait LocalDates
{
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->timezone('America/Caracas')->toDateTimeString();
    }
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->timezone('America/Caracas')->toDateTimeString();
    }
    public function getVedateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->timezone('America/Caracas')->format('d-m-Y');
    }
}
