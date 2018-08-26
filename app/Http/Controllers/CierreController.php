<?php

namespace App\Http\Controllers;

use App\Barbercierre;
use Carbon\Carbon;
use App\Corte;
use App\Cierre;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CierreController extends Controller
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
        $corte = Corte::where([
          ['created_at', '>', date('Y-m-d')],
        ])->sum('valor');

        $corte = Barbercierre::where([
            ['created_at', '>', date('Y-m-d')],
        ])->sum('valor');

        return view('cierres.index',compact('corte'));
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
     * @param  \App\Cierre  $cierre
     * @return \Illuminate\Http\Response
     */
    public function show(Cierre $cierre)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cierre  $cierre
     * @return \Illuminate\Http\Response
     */
    public function edit(Cierre $cierre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cierre  $cierre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cierre $cierre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cierre  $cierre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cierre $cierre)
    {
        //
    }

    public function reporte(Request $request)
    {
      // return $request->all();
      // $suma = Corte::where([
      //   ['user_id', '=', $request->barbero],
      //   ['created_at', '>', $ultimafecha],
      // ])->sum('valor');

      //   $suma = Corte::where([
      //   ['user_id', '=', $request->barbero],
      //   ['created_at', '>=', $request->inicio],
      //   ['created_at', '<=', $request->fin],
      // ])->suma('valor');

      // $suma = DB::table('cortes')
      //               ->where('user_id', $request->barbero)
      //               ->whereBetween('created_at', [$request->inicio , $request->fin])
      //               ->suma('valor')->first();

      //Porcentaje de ganacia
      $porcentaje = User::find($request->barbero);
      $nombre = $porcentaje->name;
      $fecha_inicio = $request->inicio;
      $fecha_fin = $request->fin;

      // $fecha_inicio = Carbon::createFromFormat('Y/m/d', $request->inicio)->toDateTimeString();
      // $fecha_inicio = Carbon::createFromTimestamp($fecha_inicio1)->diffInDays();

      //Lista los servicios hechos y Suma por fechas filtradas
      $report = DB::table('cortes')
                    ->where('user_id', $request->barbero)
                    ->whereBetween('created_at', [$request->inicio , $request->fin])->get();

      if(!$report){
        return back()->with('danger','No tiene servicios');
      }

      $suma = 0;
      foreach ($report as $key ) {
        $suma = $suma + $key->valor;
      }

      if ($porcentaje->porcent == 0){
          return back()->with('danger','Tu porcentaje es igual a 0');
      }



        $por_pagar = ($porcentaje->porcent / 100) + $suma;
        return view('reporte',compact('report','suma','por_pagar','nombre','fecha_inicio','fecha_fin'));


      // return $report;
    }
}