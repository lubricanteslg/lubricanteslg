<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use LocalDates;

    protected $fillable = ['order_id', 'qty', 'product_code', 'product_desc', 'price'];

    public static $rules = array(
                                'product_code' => array('required', 'exists:products,code'),
                                'product_desc' => array('required'),
                                'qty' => array('required', 'integer'),
                                'price' => array('required', 'numeric'),
        );

    public static function validate($input)
    {
        $v = \Validator::make($input, static::$rules);

        return $v->fails()
                ? $v
                : true;
    }

    public static function validateMany($input) {
        foreach($input as $detail)  {
            $v = static::validate($detail);
            if ($v !== true) return $v;
        }

        return true;
    }

    public function order() {
        return $this->belongsTo('App\Order');
    }

    public function getSubtotalAttribute() {
        return number_format(round($this->price*$this->qty*100,2)/100,2, ',', '.');
    }

    public function getUnitarioAttribute() {
        return number_format($this->price,2, ',', '.');
    }

}
