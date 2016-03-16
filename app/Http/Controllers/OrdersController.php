<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->json()->all();
        if($this->valid($input) !== true) return $this->valid($input);

        $order = new \App\Order;
        $order->date = $input['date'];
        $order->subtotal = $input['subtotal'];
        $order->tax = $input['tax'];
        $order->total = $input['total'];
        $order->lines = count($input['detail']);
        $order->salesman_id = $input['salesman_id'];
        $order->client_id = $input['client_id'];

        $order->save();
        $det = [];

        foreach($input['detail'] as $key=>$detail) {
            $orderDetail = new \App\OrderDetail;
            $orderDetail->order_id = $order->id;
            $orderDetail->product_code = $detail['product_code'];
            $orderDetail->product_desc = $detail['product_desc'];
            $orderDetail->line = $key;
            $orderDetail->qty = $detail['qty'];
            $orderDetail->price = $detail['price'];
            $orderDetail->save();

            $det[$key] = $orderDetail;
        }

        $order->detail = $det;

        return response()->json([
            "status" => 200,
            "statusText" => "Correctly Created Order With Id: ".$order->id,
            "order" => $order,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $req)
    {
        $order = \App\Order::find($id);

        if ($req['client']) $order->load('client');
        if ($req['salesman']) $order->load('salesman.user');
        if ($req['detail']) $order->load('detail');

        if(!$order)
            abort(404, 'Not Found');
        else

            return $order;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->json()->all();
        return $input;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Validate the user input and abort the request if it's invalid.
     *
     * @param  Array $input
     * @return \Illuminate\Http\Response
     */
    private function valid($input)
    {

        if (!$input) {

            return response()->json('Bad Request: Wrong Body Data', 400);
        }

        $validation = \App\Order::validate($input);
        $validateDetails = \App\OrderDetail::validateMany($input['detail']);

        if ($validation !== true)
            return response()->json($validation->messages(), 400);

        else if($validateDetails !== true)
            return response()->json($validateDetails->messages(), 400);

        else
            return true;
    }
}
