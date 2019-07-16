<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use App\Busines;

class FieldsUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('business.fields.create');
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
        $id = \Auth::user()->id;
        $empresa = Busines::where('id', $id)->first();
        $field = new Field($request->all());
        $field->busines_id = $empresa->id;
        //dd($field);
        $field->save();
        flash('Se creado la cancha de la empresa ' . $field->busines->name)->success();
        return redirect()->route('encargado.inicio');
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
        $field = Field::find($id);
        return view('business.fields.show')->with('field',$field);
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
        $field = Field::find($id);
        return view('business.fields.edit')->with('field',$field);
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
        //
        $field = Field::find($id);
        $field->fill($request->all());
        $field->save();
        flash('Se a editado la cancha n°:'.$field->id)->success();
        return redirect()->route('encargado.inicio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $field = Field::find($id);        
        $field->delete();
        flash('Se a eliminado la cancha de la empresa ' . $field->busines->name)->error();
        return redirect()->route('encargado.inicio');
    }
}
