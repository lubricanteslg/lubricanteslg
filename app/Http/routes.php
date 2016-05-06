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

Route::get('/filtros', function () {
    return view('filtros');
});

Route::get('/drcare', function () {
    return view('drcare');
});

Route::get('/pdv', function () {
    return view('pdv');
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


Route::get('users', function(Illuminate\Http\Request $request) {
    $users = \App\User::paginate();
    if ($request['salesman']) $users->load('salesman');
    return $users;
});

Route::get('check', function() {
    $order = \App\Order::find(63);
    return $order->getPDF()->output();
});


/*
|--------------------------------------------------------------------------
| API V1 for Salesforce App using MySQL-DBisam bridge
|--------------------------------------------------------------------------
|
| These are all the routes for the api including auth and endpoints
| for accesing the various resources such as clients, products,
| departments, etc...
|
*/
Route::group(['prefix' => 'api/v1', /*'middleware' => 'cors'*/], function () {
    
    // Routes protected with oAuth 2
    Route::group(['before' => 'oauth'], function() {
        Route::resource('orders', 'OrdersController');
        Route::resource('clients', 'ClientsController');
        Route::get('auth/user', 'Auth\AuthController@getUser');
        Route::get('auth/apilogout', 'Auth\AuthController@apiLogout');
    });

    //Unprotected routes for developing purposes.
    Route::resource('users', 'UsersController');
    Route::resource('products', 'ProductsController');
    Route::get('departments', 'ProductsController@getDepartments');
    Route::resource('salesmen', 'SalesmenController');



    //Routes protected with normal browser authentication
    Route::group(['prefix' => 'auth', /*'middleware' => 'auth'*/], function () {
        Route::get('register', 'Auth\AuthController@getRegister');
        Route::post('register', 'Auth\AuthController@postRegister');
        Route::post('login', 'Auth\AuthController@postLogin');
        Route::get('logout', 'Auth\AuthController@getLogout');
    });


    //!!!! Hard Coded Fix for cross origin requests, this needs to go away !!!!!//
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    header('Access-Control-Allow-Methods: GET, POST, PUT');
    header('Access-Control-Allow-Encoding: gzip, deflate');

    // Obtain Valid Access Token
    Route::post('oauth/access_token', function() {
     return \Response::json(Authorizer::issueAccessToken());
    });
});





Event::listen('illuminate.query', function($query)
{
    Log::info($query);
});
