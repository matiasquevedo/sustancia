<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Market;

class PrincipalController extends Controller
{
    //
    public function index(){
    	$markets = Market::all()->where('state','1');
        return view('home')->with('markets',$markets);
    }
}
