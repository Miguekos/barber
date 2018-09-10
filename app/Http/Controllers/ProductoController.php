<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProductoController extends Controller
{
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
}
