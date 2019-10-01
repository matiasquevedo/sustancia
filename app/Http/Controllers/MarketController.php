<?php

namespace App\Http\Controllers;

use App\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use App\Notification;
use LaravelFCM\Message\Topics;

class MarketController extends Controller
{
 /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //        dd("todo ok");
      $business = Market::orderBy('id','DESC')->paginate(20);
      return view('admin.business.index')->with('business',$business);
  }

  

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //Mapper::map(-34.618669, -68.339767, ['eventDblClick' => 'console.log("double left click");']);
      return view('admin.business.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //     dd($request);
      $busines = new Market($request->all());
      //tratamientos name
      if($request->name){

      }else{
        $busines->name = "Sin Nombre";
      }
      //tratamientos ubicacion
      if($request->ubicacion){

      }else{
        $busines->ubicacion = "ver mapa";
      }
      //tratamientos descripcion
      if($request->descripcion){

      }else{
        $busines->descripcion = "Sin Descripción";
      }


      //tratamientos localidad
      if($request->locality){

      }else{
        $busines->locality = $request->subAdministrativeArea;
      }

      //tratamientos localidad
      if($request->subAdministrativeArea){

      }else{
        $busines->subAdministrativeArea = $request->locality;
      }


      $busines->save();
      flash('Se creado la empresa ' . $busines->name)->success();
      return redirect()->route('markets.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
      $busines = Market::find($id);
      //dd($busines);
      return view('admin.business.show')->with('busines',$busines);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
      $busines = Market::find($id);
      return view('admin.business.edit')->with('busines',$busines);
  }

  public function post($id){
      $market = Market::find($id);
      $market->state = '1';
      $market->save();
      flash('Se a publicado el articulo: ' . $market->name)->success();
      return redirect()->route('markets.show',$market->id);
  }

  public function undpost($id){
      $market = Market::find($id);
      $market->state = '0';
      $market->save();
      flash('Se a publicado el articulo: ' . $market->name)->success();
      return redirect()->route('markets.show',$market->id);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //dd($request);
      $busines = Market::find($id);
      $busines->fill($request->all());
      if ($request->mp) {
            # code...
        }else{
            $busines->mp = '0';
        }
      $busines->save();
      flash('Se a editado la empresa ' . $busines->name)->success();
      return redirect()->route('markets.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $busines = Market::find($id);;        
      $busines->delete();
      flash('Se a eliminado ' . $busines->name . ' de forma exitosa')->error();
      return redirect()->route('markets.index');
  }

  public function varios(Request $request){
      $val=$request->act;
      $myCheckboxes = $request->input('box');

      if ($myCheckboxes == null) {            
          return redirect()->route('markets.index');
      } else {
          if ($val == '0') {

             foreach ($myCheckboxes as $b) {
                 # code...
              $article = Market::find($b);
              $article->delete();
             }
             return redirect()->route('markets.index');
          } elseif ($val == '1') {
              foreach ($myCheckboxes as $b) {
                 # code...
              $article = Market::find($b);
              $article->state = '1';
              $article->save();
             }
             return redirect()->route('markets.index');
              
          } elseif ($val == '2') {
              foreach ($myCheckboxes as $b) {
                 # code...
              $article = Market::find($b);
              $article->state = '0';
              $article->save();
             }
             return redirect()->route('markets.index');
              
          }
          
      }
  }


  /////////////////////////////API///////////////////////////
  /////////////////////////////API///////////////////////////
  /////////////////////////////API///////////////////////////
  /////////////////////////////API///////////////////////////
  /////////////////////////////API///////////////////////////
  /////////////////////////////API///////////////////////////
  /////////////////////////////API///////////////////////////
  public function ApiMarkets(){
    $markets = DB::table('marketspostview')->get();
    $json = json_decode($markets,true);
    return response()->json(array('result'=>$json));
  }

  public function ApiMarketsLocality($locality,$area){
      $markets = DB::table('marketspostview')->where('locality','LIKE',"%$locality%")->where('subAdministrativeArea','LIKE',"%$area%")->get();        
      $json = json_decode($markets,true);
      return response()->json(array('result'=>$json));
  }

  public function ApiMarketsCreate(Request $request){
    //dd('todo ok', $request);
    //     dd($request);
    $busines = new Market($request->all());
    //tratamientos name
    if($request->name){

    }else{
      $busines->name = "Sin Nombre";
    }
    //tratamientos ubicacion
    if($request->ubicacion){

    }else{
      $busines->ubicacion = "ver mapa";
    }
    //tratamientos descripcion
    if($request->descripcion){

    }else{
      $busines->descripcion = "Sin Descripción";
    }


    //tratamientos localidad
    if($request->locality){

    }else{
      $busines->locality = $request->subAdministrativeArea;
    }

    //tratamientos localidad
    if($request->subAdministrativeArea){

    }else{
      $busines->subAdministrativeArea = $request->locality;
    }


    $busines->save();
  }

  public function ApiShow($id){
      $article = Market::get()->find($id);
      $json = json_decode($article,true);
      return response()->json(array('result'=>$json));
  }
}





