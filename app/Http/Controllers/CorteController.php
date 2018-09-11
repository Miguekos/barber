<?php

namespace App\Http\Controllers;

use App\Servicio;
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
      $servicios = Servicio::all();
      $datos = Corte::where([
          ['user_id', '=' ,$user->id],
          ['activo', '=' ,1],
//          ['created_at', 'LIKE', date('Y-m-d%')],
      ])->get();
      $suma = Corte::where('user_id',$user->id)
          ->where('activo',1)
          ->sum('valor');

      return view('cortes.index',compact('user','datos','suma','servicios'));
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
      if (!$request->motivo_id) {
        return back()->with('flash','Debes seleccionar un Servicio..!!');
      }else {
        $dato = Corte::create($request->all());
        $dato->valor = $request->precio - $request->descuento;
        $dato->save();

        return redirect()->back()->with('success','Servicio Agregado..!!');
      }

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

//      Corte::where('activo', 1)
//          ->where('user_id',auth()->user()->id)
//          ->update(['activo' => 0]);
      return redirect()->back();
    }
}
