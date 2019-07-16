<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use App\Busines;

class CourtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courts = Field::orderBy('id','DESC')->paginate(20);
        return view('admin.courts.index')->with('courts',$courts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $business = Busines::orderBy('name','ASC')->pluck('name','id');
        return view('admin.courts.create')->with('business',$business);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $court = new Field($request->all());
        //dd($court);
        $court->save();
        flash('Se creado la cancha de la empresa ' . $court->busines->name)->success();
        return redirect()->route('courts.index');
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
        return view('admin.courts.show')->with("field",$field);
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
        $court = Field::find($id);
        return view('admin.courts.edit')->with('court',$court);
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
        //dd("desde editar");
        $court = Field::find($id);
        $court->fill($request->all());
        $court->save();
        flash('Se a editado la cancha de la empresa ' . $court->busines->name)->success();
        return redirect()->route('courts.index');

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
        $court = Field::find($id);        
        $court->delete();
        flash('Se a eliminado la cancha de la empresa ' . $court->busines->name)->error();
        return redirect()->route('courts.index');
    }
}
