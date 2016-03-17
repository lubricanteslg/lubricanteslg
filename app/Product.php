<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use LocalDates;

    public function department() {
        return $this->belongsTo('App\Department');
    }

    protected $fillable = ['code', 'description', 'stock', 'price', 'department_id', 'category', 'brand', 'img_url'];

    public static $rules = array(
                                'code' => array('min:4', 'unique:products,code'),
                                'description' => array('required_without:id'),
                                'stock' => array('required_without:id', 'integer'),
                                'price' => array('required_without:id','numeric', 'between:0.00,999999999.99'),
                                'department_id' => array('exists:departments,id'),
        );

    public static function validate($input)
    {
        $v = \Validator::make($input, static::$rules);

        return $v->fails()
                ? $v
                : true;
    }

    public function getPriceAttribuite($value) {
        return number_format($value, 2);
    }
}
