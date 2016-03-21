<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    use LocalDates;

    protected $fillable = [
        "code",
        "name",
        "business_type",
        "business_id",
        "address",
        "phone",
        "email",
        "zone",
        "zone2",
        "salesman_id"
    ];

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function salesman() {
        return $this->belongsTo('App\Salesman');
    }

    public static $rules = array(
                                //'code' => array('unique:clients,code'),
                                'name' => array('required_without:id', 'min:6'),
                                'business_type' => array('required_without:id', 'alpha', 'max:1'),
                                'business_id' => array('required_without:id', 'min:5', 'unique:clients,business_id'),
                                //'email' => array('email'),
                                'salesman_id' => array('exists:salesmen,id')
        );

    public static function validate($input, $custom)
    {
        $rules = array_merge(static::$rules,$custom);
        $v = \Validator::make($input, $rules);

        return $v->fails()
                ? $v
                : true;
    }

}
