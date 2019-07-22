<?php

use Illuminate\Http\Request;
use App\Market;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
//header("Access-Control-Allow-Origin: *");
//header('Access-Control-Allow-Methods: POST,PUT,PATCH,OPTIONS');
//header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

Route::group(['prefix'=>'/v1','middleware' => 'cors'], function(){



	Route::get('/markets',[
		/*header("Access-Control-Allow-Origin: *"),
		header('Access-Control-Allow-Methods: POST,GET,PUT,PATCH,OPTIONS'),
		header('Access-Control-Allow-Headers: Origin, X-Requested-With, content-type, Accept'),*/
		'uses'=>'MarketController@ApiMarkets'
	]);

	Route::post('/markets',[
		/*header("Access-Control-Allow-Origin: *"),
		header('Access-Control-Allow-Methods: POST,GET,PUT,PATCH,OPTIONS'),
		header('Access-Control-Allow-Headers: Origin, X-Requested-With, content-type, Accept'),*/
		'uses'=>'MarketController@ApiMarketsCreate'
	]);

});