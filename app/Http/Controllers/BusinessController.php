<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Busines;
use Mapper;


class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        dd("todo ok");
        $business = Busines::orderBy('id','DESC')->paginate(20);
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
        //
        //dd($request);
        $busines = new Busines($request->all());
        //el administrador deberia elegir al usuario... no ser el usuario
        $busines->user_id = \Auth::user()->id;
        $busines->save();
        flash('Se creado la empresa ' . $busines->name)->success();
        return redirect()->route('business.index');
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
        $busines = Busines::find($id);
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
        $busines = Busines::find($id);
        return view('admin.business.edit')->with('busines',$busines);
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
        $busines = Busines::find($id);
        $busines->fill($request->all());
        $busines->save();
        flash('Se a editado la empresa ' . $busines->name)->success();
        return redirect()->route('business.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $busines = Busines::find($id);;        
        $busines->delete();
        flash('Se a eliminado ' . $busines->name . ' de forma exitosa')->error();
        return redirect()->route('business.index');
    }
}
