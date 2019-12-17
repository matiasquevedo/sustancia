<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Market;

class PrincipalController extends Controller
{
    //
    public function index(){
    	$client = new Client();
    	$ip = \Request::ip();
    	$ip = '168.181.211.101';
    	//dd($ip);
    	$url = 'http://api.ipstack.com/'.$ip.'?access_key=612dc8e80fe2254df2e06506f72e72d8';
    	//dd($url);
    	$response = $client->request('GET', $url);
    	$statusCode = $response->getStatusCode();
    	$body = $response->getBody()->getContents();
    	$data = json_decode($body, true);
    	//dd($statusCode,$body,$data);
    	$markets = Market::all()->where('state','1');
        return view('home')->with('markets',$markets)->with('data',$data)->with('ip',$ip);
    }
}
