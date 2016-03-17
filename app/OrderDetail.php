<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use LocalDates;
    
    protected $fillable = ['order_id', 'qty', 'product_code', 'product_desc', 'price'];

    public static $rules = array(
                                'product_code' => array('required', 'exists:products,code'),
                                'product_desc' => array('required', 'alpha_num'),
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
}
