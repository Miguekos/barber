<?php

namespace App\Http\Controllers;

use App\Barber;
use Carbon\Carbon;
use App\Corte;
use App\Cierre;
use App\User;
use App\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportController extends Controller
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
      $barberos = User::all();
      return view('reports.index',compact('barberos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function reportShow()
    {
        $barberos = Barber::all();
        return view('reports.show',compact('barberos'));
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
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }

    public function reporte(Request $request)
    {
        $fecha_i = $request->inicio . " 00:59:00";
        $fecha_f = $request->fin . " 23:59:00";
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
      $nombre_barbero = $porcentaje->name;
      $fecha_inicio = $request->inicio;
      $fecha_fin = $request->fin;

      // $fecha_inicio = Carbon::createFromFormat('Y/m/d', $request->inicio)->toDateTimeString();
      // $fecha_inicio = Carbon::createFromTimestamp($fecha_inicio1)->diffInDays();

      //Lista los servicios hechos y Suma por fechas filtradas
      $report = DB::table('cortes')
                    ->where('user_id', $request->barbero)
                    ->whereBetween('created_at', [$fecha_i , $fecha_f])->get();

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

        $por_pagar = ($porcentaje->porcent / 100) * $suma;
        return view('reporte',compact('report','suma','por_pagar','nombre_barbero','fecha_inicio','fecha_fin'));


      // return $report;
    }

    public function reporteShow(Request $request)
    {
        $fecha_inicio = $request->inicio . " 00:00:00";
        $fecha_fin = $request->fin . " 23:59:00";
        echo $fecha_inicio;
        echo $fecha_fin;

        $corte = DB::table('cortes')
            ->where('barber_id', $request->barbero)
            ->whereBetween('created_at', [$fecha_inicio , $fecha_fin])->get();

        $sumac = 0;
        foreach ($corte as $key ) {
            $sumac = $sumac + $key->valor;
        }

        $venta = DB::table('ventas')
            ->where('id_user', $request->barbero)
            ->whereBetween('created_at', [$fecha_inicio , $fecha_fin])->get();

        $sumav = 0;
        foreach ($venta as $key ) {
            $sumav = $sumav + $key->total;
        }

        $efectivo = DB::table('cortes')
            ->where('barber_id', $request->barbero)
            ->where('meto_pago', 'Efectivo')
            ->whereBetween('created_at', [$fecha_inicio , $fecha_fin])->get();

        $efectivov = 0;
        foreach ($efectivo as $key ) {
            $efectivov = $efectivov + $key->valor;
        }

        $tarjeta = DB::table('cortes')
            ->where('barber_id', $request->barbero)
            ->where('meto_pago', 'Tarjeta')
            ->whereBetween('created_at', [$fecha_inicio , $fecha_fin])->get();

        $tarjetav = 0;
        foreach ($tarjeta as $key ) {
            $tarjetav = $tarjetav + $key->valor;
        }

        $barberia = Barber::find($request->barbero);
        $nombre_barber = $barberia->nombre;
        
        $cierre = DB::table('cierres')
            ->where('barber_id',$request->barbero)
            ->whereBetween('created_at', [$fecha_inicio , $fecha_fin])->get();

        return view('reporteg',compact('corte','venta','sumac','sumav','efectivov','tarjetav','nombre_barber','cierre'));

    }
}