<?php

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
    return redirect('http://localhost');
});

$router->post('/login', 'AuthController@login');
$router->post('/register', 'AuthController@register');
$router->get('/user', 'UserController@userHasLogin');

$router->post('/kategori/add', 'KategoriController@store');
$router->get('/kategori', 'KategoriController@index');
$router->delete('/kategori/delete/{id}', 'KategoriController@delete');
$router->post('/kategori/update/{id}', 'KategoriController@update');
$router->get('/kategori/{id}', 'KategoriController@show');

$router->post('/produk/add', 'ProdukController@store');
$router->delete('/produk/delete/{id}', 'ProdukController@delete');
$router->post('/produk/update/{id}', 'ProdukController@update');

$router->get('/produk/{id}', 'ProdukController@show');
$router->get('/produk', 'ProdukController@index');
