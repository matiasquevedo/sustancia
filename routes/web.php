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

	Route::resource('business','BusinessController');
	Route::get('business/{id}/destroy',[
		'uses'=>'BusinessController@destroy',
		'as'=>'business.destroy'
	]);

	Route::resource('users','UsersController');
	Route::get('users/{id}/destroy',[
		'uses'=>'UsersController@destroy',
		'as'=>'users.destroy'
	]);

	Route::resource('courts','CourtsController');
	Route::get('court/{id}/destroy',[
		'uses'=>'CourtsController@destroy',
		'as'=>'court.destroy'
	]);

	Route::resource('turns','TurnsController');
	Route::get('turn/{id}/destroy',[
		'uses'=>'TurnsController@destroy',
		'as'=>'turn.destroy'
	]);

	Route::resource('reservations','ReservationsController');
	Route::get('reservation/{id}/destroy',[
		'uses'=>'ReservationsController@destroy',
		'as'=>'reservation.destroy'
	]);

	Route::resource('bookings','BookingController');
	Route::get('bookings/{id}/destroy',[
		'uses'=>'BookingController@destroy',
		'as'=>'bookings.destroy'
	]);
});

Route::group(['prefix'=>'encargado','middleware'=>['auth','encargado']], function(){

	Route::get('/',function(){
		return view('business.index');
	})->name('encargado.inicio');

	Route::resource('businessUsers','BusinessUsersController');
	Route::get('business/{id}/destroy',[
		'uses'=>'BusinessUsersController@destroy',
		'as'=>'businessUser.destroy'
	]);


	Route::resource('fields','FieldsUsersController');
	Route::get('fields/{id}/destroy',[
		'uses'=>'FieldsUsersController@destroy',
		'as'=>'fields.destroy'
	]);

	/*Route::resource('turns','TurnsController');
	Route::get('turn/{id}/destroy',[
		'uses'=>'TurnsController@destroy',
		'as'=>'turn.destroy'
	]);

	Route::resource('reservations','ReservationsController');
	Route::get('reservation/{id}/destroy',[
		'uses'=>'ReservationsController@destroy',
		'as'=>'reservation.destroy'
	]);

	Route::resource('bookings','BookingController');
	Route::get('bookings/{id}/destroy',[
		'uses'=>'BookingController@destroy',
		'as'=>'bookings.destroy'
	]);*/
});

Route::group(['prefix'=>'cliente','middleware'=>['auth','cliente']], function(){

	Route::get('/',function(){
		return view('customers.index');
	})->name('cliente.inicio');

	Route::get('/reservations/{user_id}', [
		'uses'=>'ReservationUsersController@index',
		'as'=>'customers.reservations'
	]);
});


Auth::routes();

Route::get('/', 'HomeController@inicio');
Route::get('/inicio', [
	'uses'=>'PrincipalController@index',
	'as'=>'principal'
]);

