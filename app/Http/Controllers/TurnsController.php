<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turn;
use App\Field;

class TurnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $turns = Turn::orderBy('id','DESC')->paginate(20);
        return view('admin.turns.index')->with('turns',$turns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courts = Field::orderBy('id','ASC')->pluck('id','id');
        return view('admin.turns.create')->with('courts',$courts);
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
        $turn = new Turn($request->all());
        if ($request->state) {
            $turn->state = $request->state;
        } else {
            $turn->state = '0';
        }
        
        $turn->save();
        flash('Se creado el turno de la cancha n°:' .$turn->field->id. ' de la empresa ' .$turn->field->busines->name)->success();
        return redirect()->route('courts.show',$turn->field->id);
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
        $turn = Turn::find($id);
        return view('admin.turns.edit')->with('turn',$turn);
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
        $turn = Turn::find($id);
        $turn->fill($request->all());
        $turn->save();
        flash('Se a editado el turno de la cancha n°:' .$turn->field->id. ' de la empresa ' .$turn->field->busines->name)->success();
        return redirect()->route('courts.show',$turn->field->id);
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
        $turn = Turn::find($id);      
        $turn->delete();
        flash('Se a eliminado el turno de la cancha n°:' .$turn->field->id. ' de la empresa ' .$turn->field->busines->name)->error();
        return redirect()->route('courts.show',$turn->field->id);
    }
}
