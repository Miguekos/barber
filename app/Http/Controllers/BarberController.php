<?php

namespace App\Http\Controllers;

use App\Barber;
use Illuminate\Http\Request;

class BarberController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barbers = Barber::all();
        return view('barbers.index',compact('barbers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barbers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $dato = Barber::create($request->all());
      $dato->save();
      return redirect()->route('barber.index')->with('success','Se guardo correctamente la barberia.!');
      // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barber  $barber
     * @return \Illuminate\Http\Response
     */
    public function show(Barber $barber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barber  $barber
     * @return \Illuminate\Http\Response
     */
    public function edit(Barber $barber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barber  $barber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barber $barber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barber  $barber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barber $barber)
    {
        //
    }
}
