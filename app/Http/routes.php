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






Route::get('users', function() {
    return \App\User::paginate();
});

Route::get('check', function() {
    dd(\Auth::check());
});

Route::post('oauth/access_token', function() {
 return \Response::json(Authorizer::issueAccessToken());
});
Route::get('api', ['before' => 'oauth', function() {
 // return the protected resource
 //echo “success authentication”;
     $user_id=Authorizer::getResourceOwnerId(); // the token user_id
     $user=\App\User::find($user_id);// get the user data from database
    return Response::json($user);
}]);

Route::group(['prefix' => 'api/v1', 'middleware' => 'cors'], function () {
    Route::resource('users', 'UsersController');
    Route::resource('clients', 'ClientsController');
    Route::resource('orders', 'OrdersController');
    Route::resource('products', 'ProductsController');
    Route::resource('salesmen', 'SalesmenController');

    Route::group(['prefix' => 'auth', /*'middleware' => 'auth'*/], function () {
        Route::get('register', 'Auth\AuthController@getRegister');
        Route::post('register', 'Auth\AuthController@postRegister');
        Route::post('login', 'Auth\AuthController@postLogin');
        Route::get('logout', 'Auth\AuthController@getLogout');

        });
});





Event::listen('illuminate.query', function($query)
{
    Log::info($query);
});
