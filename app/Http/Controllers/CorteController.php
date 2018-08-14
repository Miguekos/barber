<?php

namespace App\Http\Controllers;

use App\Corte;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CorteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // Obtiene el objeto del Usuario Autenticado
      $user = Auth::user();

      // Obtiene el ID del Usuario Autenticado
      // $id = Auth::id();
      $datos = Corte::where('user_id',$user->id)->get();
      $suma = Corte::where('user_id',$user->id)->sum('valor');
      return view('cortes.index',compact('user','datos','suma'));
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
      $dato = Corte::create($request->all());
      $dato->save();
      return redirect()->back();
      // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Corte  $corte
     * @return \Illuminate\Http\Response
     */
    public function show(Corte $corte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Corte  $corte
     * @return \Illuminate\Http\Response
     */
    public function edit(Corte $corte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Corte  $corte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corte $corte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Corte  $corte
     * @return \Illuminate\Http\Response
     */
    public function destroy($corte)
    {
      $dato = Corte::find($corte);
      $dato->delete();
      return redirect()->back();
    }
}
