<?php

namespace App\Http\Controllers;

use App\Barber;
use App\Venta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PharIo\Version\VersionTest;

class VentaController extends Controller
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
        return view('ventas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }

    public function facturas()
    {
        $id = auth()->user()->barber_id;
        $ventas = Venta::where('id_user',$id)
            ->where('activo',1)
            ->get();
        return view('ventas.show',compact('ventas'));
    }

    public function facturasadmin()
    {
        $barberos = Barber::all();
        return view('facturasadmin',compact('barberos'));
    }

    public function facturasstore(Request $request)
    {
        $fecha_inicio = $request->inicio . " 00:00:00";
        $fecha_fin = $request->fin . " 23:59:00";

        $venta = DB::table('ventas')
            ->where('id_user', $request->barbero)
            ->whereBetween('hora', [$fecha_inicio , $fecha_fin])->toSql();
//    dd($venta);
//        $sumav = 0;
//        foreach ($venta as $key ) {
//            $sumav = $sumav + $key->total;
//        }

        $barberia = Barber::find($request->barbero);
        $nombre_barber = $barberia->nombre;

        return view('facturasa',compact('venta','sumav','nombre_barber'));
    }
}
