<?php

namespace App\Http\Controllers;

use App\Barbercierre;
use Carbon\Carbon;
use App\Corte;
use App\Cierre;
use App\User;
use App\Venta;
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
        $recaudado = Barbercierre::where([
          ['activo', '=', 1],
        ])->sum('recaudado');

        $por_pagar = Barbercierre::where([
            ['activo', '=', 1],
        ])->sum('por_pagar');

        $ganancia = Barbercierre::where([
            ['activo', '=', 1],
        ])->sum('ganancia');

        $productos = Venta::where([
            ['activo', '=', 1],
        ])->sum('total');

//        $cantidad_cortes = Venta::count('id')
//        ->where('activo',1);

        $cantidad_cortes = Barbercierre::where([
            ['activo', '=', 1],
        ])->sum('cantidad_cortes');

//        $productos = DB::table('ventas')
//            ->where('activo', 1)
//            ->first();


//        $productos = Venta::DB([
//            ['activo', '=', 1],
//        ])->sum('total');

        $cierre = Cierre::all();

        return view('cierres.index',compact('recaudado','por_pagar','ganancia','cierre','productos','cantidad_cortes'));
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
        if (!$request->ventas_cortes) {
            return back()->with('flash','No se puede cerrar caja vacia..!!');
        }else {
            Cierre::create($request->all());

            Barbercierre::where('activo',1)
                ->update(['activo' => 0]);

            Venta::where('activo',1)
                ->update(['activo' => 0]);

            return back()->with('success','Cierre realizado correctamente..!!');
        }


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
    public function destroy($cierre)
    {

        $dato = Cierre::find($cierre);
        $dato->delete();
        return back()
            ->with('success','Se elimino correctamente..!!');

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
