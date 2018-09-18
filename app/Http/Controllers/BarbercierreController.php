<?php

namespace App\Http\Controllers;

use App\Barbercierre;
use Illuminate\Http\Request;

class BarbercierreController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barbercierre  $barbercierre
     * @return \Illuminate\Http\Response
     */
    public function show(Barbercierre $barbercierre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barbercierre  $barbercierre
     * @return \Illuminate\Http\Response
     */
    public function edit(Barbercierre $barbercierre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barbercierre  $barbercierre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barbercierre $barbercierre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barbercierre  $barbercierre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barbercierre $barbercierre)
    {
        //
    }
}
