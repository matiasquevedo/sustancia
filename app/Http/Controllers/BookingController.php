<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Turn;
use App\Reservation;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookings = Booking::orderBy('id','ASC')->paginate(20);
        return view('admin.bookings.index')->with('bookings',$bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $turns = Turn::orderBy('id','ASC')->pluck('id','id');
        $reservations = Reservation::orderBy('id','ASC')->pluck('id','id');
        return view('admin.bookings.create')->with("turns",$turns)->with("reservations",$reservations);
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
        $booking = new Booking($request->all());
        //dd($booking);
        $booking->save();
        flash('Se genero su reserva' . $booking->name)->success();
        return redirect()->route('bookings.store');
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
        $turns = Turn::orderBy('id','ASC')->pluck('id','id');
        $reservations = Reservation::orderBy('id','ASC')->pluck('id','id');        
        $booking = Booking::find($id);
        return view('admin.bookings.edit')->with('booking',$booking)        ->with("turns",$turns)->with("reservations",$reservations);
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
        //        dd($id);
        $booking = Booking::find($id);
        $booking->fill($request->all());
        $booking->save();
        flash('Se a editado la reseva' . $booking->name)->success();
        return redirect()->route('bookings.index');
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
        $booking = Booking::find($id);
        flash('Se a borrado la reserva N° ' . $booking->id)->error();
        $booking->delete();
        return redirect()->route('bookings.index');        
        
    }
}
