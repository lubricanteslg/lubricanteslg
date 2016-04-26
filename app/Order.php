<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use LocalDates;

    public static $rules = array(
                                'date' => array('required', 'date'),
                                'subtotal' => array('required', 'numeric'),
                                'tax' => array('required', 'numeric'),
                                'total' => array('required', 'numeric'),
                                'salesman_id' => array('required', 'exists:salesmen,id'),
                                'client_id' => array('required_without:id', 'exists:clients,id'),
                                'detail' => array('array')
        );

    public static function validate($input)
    {
        $v = \Validator::make($input, static::$rules);

        return $v->fails()
                ? $v
                : true;
    }

    public function client() {
        return $this->belongsTo('App\Client');
    }

    public function detail() {
        return $this->hasMany('App\OrderDetail');
    }

    public function salesman() {
        return $this->belongsTo('App\Salesman');
    }

    public function getPdf() {
        $pdf = new \mPDF();
        if (!$this->detail) $this->load('detail');
        if (!$this->salesman) $this->load('salesman');
        if (!$this->client) $this->load('client');

        $pdf->writeHTML(view('pdf.pedido')->with('order', $this)->render());

        return $pdf;
    }
}
