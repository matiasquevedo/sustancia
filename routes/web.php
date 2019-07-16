<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function(){

	Route::get('/',function(){
		return view('admin.index');
	})->name('admin.inicio');

	Route::resource('markets','MarketController');
	Route::get('markets/{id}/destroy',[
		'uses'=>'MarketController@destroy',
		'as'=>'markets.destroy'
	]);

	Route::resource('users','UsersController');
	Route::get('users/{id}/destroy',[
		'uses'=>'UsersController@destroy',
		'as'=>'users.destroy'
	]);

	Route::get('market/{id}/post',[
		'uses'=>'MarketController@post',
		'as'=>'market.post'
	]);
	Route::get('market/{id}/undpost',[
		'uses'=>'MarketController@undpost',
		'as'=>'market.undpost'
	]);
});



Auth::routes();

Route::get('/', 'HomeController@inicio');
Route::get('/inicio', [
	'uses'=>'PrincipalController@index',
	'as'=>'principal'
]);

