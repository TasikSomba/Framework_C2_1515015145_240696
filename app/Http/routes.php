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
    return view ('welcome');
});

//Route::get('/', function () {
  //  return ('My Name is : Tasik Somba B.L');
//});

Route::get('pengguna2/{pengguna2}', function($pengguna2){
		return "Hello world dari pengguna2 $pengguna2";

	});
Route::auth();

Route::get('/home', 'HomeController@index');
