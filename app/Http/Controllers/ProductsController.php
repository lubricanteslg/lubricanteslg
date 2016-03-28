<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request['qcode']) && !isset($request['qdesc'])) {
            $products = \App\Product::where('code', 'like', "%".$request['qcode']."%")->take(5)->get();
            return $products;
        }

        else if (isset($request['qdesc']) && !isset($request['qcode'])) {
            $products = \App\Product::where('description', 'like', "%".$request['qdesc']."%")->take(5)->get();;
            return $products;
        }

        else if (isset($request['qdesc']) && isset($request['qcode']) ) {
            $products = \App\Product::where('code', 'like', "%".$request['qcode']."%")->orWhere('description', 'like', "%".$request['qdesc']."%")->take(5)->get();
            return $products;
        }

        else {
            return \App\Product::paginate($request['perPage'])->appends(['perPage' => $request['perPage']]);
        }


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

        $product = \App\Product::create($input);

        return response()->json([
            "status" => 201,
            "statusText" => "Correctly created product with id: ".$product->id,
            "product" => $product,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $req)
    {
        $product = \App\Product::find($id);

        if ($req['dep']) $product->load('department');

        if(!$product)
            abort(404, 'Not Found');
        else

            return $product;
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
        if ($request['cod']){
            $product = \App\Product::whereCode($id)->first();
            $cid = $product->id;
        }

        $input = $request->json()->all();
        if($this->valid($input, $cid) !== true) return $this->valid($input, $cid);

        if (!$request['cod']) $product = \App\Product::find($id);
        $product->fill($input);

        $product->save();


        return response()->json([
            "status" => 200,
            "statusText" => "OK: Correctly modified product With Id: ".$product->id,
            "product" => $product,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\App\Product::destroy($id))
            return response()->json([
                "status" => 200,
                "statusText" => "OK: Correctly Deleted The Selected Product",
            ], 200);
        else
            abort(400, "Bad Request");
    }

    /**
     * Validate the user input and abort the request if it's invalid.
     *
     * @param  Array $input
     * @return \Illuminate\Http\Response
     */
    private function valid($input, $editing = false)
    {

        if (!$input) {
            return abort(400, "Bad Request: Wrong body data");
        }

        $custom['code'] = array('unique:products,code,'.$editing);
        $validation = \App\Product::validate($input, $custom);

        if ($validation !== true)
            return response()->json([
                "status" => 400,
                "statusText" => "Bad Request: Validation failed",
                "errors" => $validation->messages()
            ], 400);
        else
            return true;
    }
}
