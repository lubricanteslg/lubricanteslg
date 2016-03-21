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


Route::get('api', ['before' => 'oauth', function() {
 // return the protected resource
 //echo “success authentication”;
     $user_id=Authorizer::getResourceOwnerId(); // the token user_id
     $user=\App\User::find($user_id);// get the user data from database
    return Response::json($user);
}]);

Route::group(['prefix' => 'api/v1', /*'middleware' => 'cors'*/], function () {
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

    header('Access-Control-Allow-Origin: http://localhost:3000');
    header('Access-Control-Allow-Headers: Content-Type');
    Route::post('oauth/access_token', function() {
     return \Response::json(Authorizer::issueAccessToken());
    });
});

use \GuzzleHttp\Client;

Route::get('/fetchclients', function () {
    setlocale(LC_ALL, 'es_ES');
    $file = fopen(storage_path()."/app/clients.csv", "r+");

    $i = 0;
    $headers = fgetcsv($file, $delimiter = ',');
    $result;
    while(!feof($file))
    {
        $line = fgetcsv($file, $delimiter = ',');

            for ($j = 0; $j <= count($line)-1; $j++) {
                $result[$i][$headers[$j]] = utf8_encode($line[$j]);
            }


        $i++;
    }
    $http = new Client();
    fclose($file);

    foreach($result as $key=>$client) {
        if(isset($client['name'])){
            $verify = \App\Client::whereCode($client['code'])->first();
            if ($verify) {
                $client['cod'] = true;
                $res = $http->request('PUT', url('/').'/api/v1/clients/'.$client['code'], [
                    'json' => $client
                ]);
                echo 'Updated Client: '.$client['code'].'<br>';
            } else {
                $res = $http->request('POST', url('/').'/api/v1/clients', [
                    'json' => $client
                ]);
                echo 'Created Client: '.$client['code'].'<br>';
            }
        }
    }


});

Route::get('/fetchproducts', function () {
    setlocale(LC_ALL, 'es_ES');
    $file = fopen(storage_path()."/app/products.csv", "r+");

    $i = 0;
    $headers = fgetcsv($file, $delimiter = ',');
    $result;
    while(!feof($file))
    {
        $line = fgetcsv($file, $delimiter = ',');

            for ($j = 0; $j <= count($line)-1; $j++) {
                $result[$i][$headers[$j]] = utf8_encode($line[$j]);
            }


        $i++;
    }
    $http = new Client();
    fclose($file);

    foreach($result as $key=>$product) {
        if(isset($client['name'])){
            $verify = \App\Product::whereCode($produt['code'])->first();
            if ($verify) {
                $product['cod'] = true;
                $res = $http->request('PUT', url('/').'/api/v1/products/'.$product['code'], [
                    'json' => $product
                ]);
                echo 'Updated Product: '.$product['code'].'<br>';
            } else {
                $res = $http->request('POST', url('/').'/api/v1/products', [
                    'json' => $client
                ]);
                echo 'Created Product: '.$product['code'].'<br>';
            }
        }
    }


});



Event::listen('illuminate.query', function($query)
{
    Log::info($query);
});
