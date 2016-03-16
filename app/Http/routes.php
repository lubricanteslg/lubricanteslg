<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('portada');
});

Route::get('/productos', function () {
    return view('productos');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::post('/contacto', function () {
	$request = Request::all();
  $data['body'] = $request;
	$mail = Mail::send('emails.test', $data, function ($m) use ($request) {
            $m->from('webadmin@diluga.com.ve', 'Web Admin');
            $m->replyTo($request['email'], $request['name']);

            $m->to('webadmin@diluga.com.ve', 'Web Admin')->subject($request['subject']);
            $m->cc('ramonlv93@gmail.com');
    });
    return redirect('/');
});


Route::get('/filtros', function () {
    return view('filtros');
});

Route::get('/drcare', function () {
    return view('drcare');
});

Route::get('/pdv', function () {
    return view('pdv');
});




Route::get('api/v1/logout', 'Auth\AuthController@getLogout');
Route::post('api/v1/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::group(['prefix' => 'api/v1', /*'middleware' => 'auth'*/], function () {
    Route::resource('clients', 'ClientsController');
    Route::resource('orders', 'OrdersController');
    Route::resource('products', 'ProductsController');
    Route::resource('salesmen', 'SalesmenController');
});





Event::listen('illuminate.query', function($query)
{
    Log::info($query);
});
