<?php
header('Content-Type: text/html; charset=UTF-8');
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
