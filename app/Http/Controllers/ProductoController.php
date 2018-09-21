<?php

namespace App\Http\Controllers;

use App\Barber;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProductoController extends Controller
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
        $id = auth()->user()->barber_id;
        $produc = Producto::where('barber_id',$id)->get();
        return view('productos.index',compact('produc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        Producto::create($request->all());
        return back()->with('success','Se agrego su producto correctamente..!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $produc = Producto::find($producto);
        return view('productos.edit',compact('produc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        if ($request->agregar){
            $actual = Producto::find($producto->id);
            $total = $actual->cantidad + $request->agregar;

            Producto::where('id',$producto->id)
                ->update(['cantidad' => $total]);

            return back()->with('flash','Se agregar correctamente '. $request->agregar . ' al producto ' .$producto->nombre .'..!!');

        }else{
            $actual = Producto::find($producto->id);
            $total = $actual->cantidad - $request->eliminar;

            Producto::where('id',$producto->id)
                ->update(['cantidad' => $total]);

            return back()->with('flash','Se Elimino correctamente '. $request->agregar . ' al producto ' .$producto->nombre .'..!!');
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }

    public function productosadmin()
    {
        $barberos = Barber::all();
        return view('productosadmin',compact('barberos'));
    }

    public function productosstore(Request $request)
    {
        // $fecha_inicio = $request->inicio . " 00:00:00";
        // $fecha_fin = $request->fin . " 23:59:00";

        $producto = DB::table('productos')
            ->where('barber_id', $request->barbero)->get();
            // ->whereBetween('created_at', [$fecha_inicio , $fecha_fin])->get();

//        $sumav = 0;
//        foreach ($producto as $key ) {
//            $sumav = $sumav + $key->total;
//        }

        $barberia = Barber::find($request->barbero);
        $nombre_barber = $barberia->nombre;

        return view('productosa',compact('producto','nombre_barber'));
    }

    public function getitem()
    {
        $producto = Input::get('q');
        $barberia = Input::get('b');
//        $respuesta = Producto::where('barber_id',$barberia)
//            ->OrWhere([
//                (['id','LIKE',$producto]),
//                ['nombre','LIKE',$producto],
//                ['categoria','LIKE',$producto],
//                ['marca','LIKE',$producto]
//            ])
//            ->toSql();


        $respuesta = DB::table('productos')
            ->where('barber_id', '=', $barberia)
            ->where(function ($query) use ($producto) {
                $query->where('id', '=', $producto)
                    ->orWhere('nombre', 'LIKE', '%'.$producto.'%')
                    ->orWhere('categoria', 'LIKE', '%'.$producto.'%')
                    ->orWhere('marca', 'LIKE', '%'.$producto.'%');
            })
            ->get();

        return view('ventas.item',compact('respuesta'));
//        return $respuesta;
    }

}
