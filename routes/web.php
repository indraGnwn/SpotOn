<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return "Hello world";
});

$router->post('/login', 'AuthController@login');
$router->post('/register', 'AuthController@register');
$router->get('/user', 'UserController@userHasLogin');

$router->post('/kategori', 'KategoriController@store'); //nambah kategori
$router->get('/kategori', 'KategoriController@index'); //menampilkan semua kategori
$router->delete('/kategori/{id}', 'KategoriController@delete'); 
$router->post('/kategori/update/{id}', 'KategoriController@update'); //edit kategori
$router->get('/kategori/{id}', 'KategoriController@show'); //menampilkan kategori berdasarkan id kategori

$router->post('produk', [
    'middleware' => 'auth',
    'uses' => 'ProdukController@store'
]); //menambah produk
$router->get('/produk', 'ProdukController@index'); //menampilkan semua produk
$router->delete('/produk/{id}', 'ProdukController@delete'); 
$router->post('/produk/update/{id}', 'ProdukController@update'); //edit produk
$router->get('/produk/{id}', 'ProdukController@show'); //menampilkan produk berdasarkan id produk

//$router->get('/user_produk', 'UserController@produk_saya'); 


