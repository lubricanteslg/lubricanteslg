<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use LucaDegasperi\OAuth2Server\Facades\AuthorizerFacade as Authorizer;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return \App\Client::orderBy('code')->paginate($request['perPage'])->appends(['perPage' => $request['perPage']]);
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

        $client = \App\Client::create($input);
        \Log::info(['client' => $client]);
        return response()->json([
            "status" => 201,
            "statusText" => "Correctly created client with id: ".$client->id,
            "client" => $client,
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
        $salesman = \App\Salesman::whereUser_id(Authorizer::getResourceOwnerId())->first();

        if ($req['code']) $client = \App\Client::whereCodeAndSalesman_id($id, $salesman->id)->first();
        else $client = \App\Client::find($id);

        if($req['orders']) $client->load('orders.detail');
        if($req['salesman']) $client->load('salesman');

        if(!$client)
            abort(404, 'Not Found');
        else

            return $client;
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
            $client = \App\Client::whereCode($id)->first();
            $cid = $client->id;
        }

        $input = $request->json()->all();
        if($this->valid($input, $cid) !== true) return $this->valid($input, $cid);


        if (!$request['cod']) $client = \App\Client::find($id);
        $client->fill($input);

        $client->save();


        return response()->json([
            "status" => 200,
            "statusText" => "OK: Correctly modified Client With Id: ".$client->id,
            "client" => $client,
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
        if(\App\Client::destroy($id))
            return response()->json([
                "status" => 200,
                "statusText" => "OK: Correctly Deleted The Selected Client",
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
        $editing = intval($editing);

        if (!$input) {
            return abort(400, "Bad Request: Wrong body data");
        }
        $custom['business_id'] = array('required_without:id', 'min:5', 'unique:clients,business_id,'.$editing);

        $custom['code'] = array('unique:clients,code,'.$editing);
        $validation = \App\Client::validate($input, $custom);

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
