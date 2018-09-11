<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $gastos = Gasto::where('barber_id', $user->barber_id);
//        $gastos = Gasto::all();
        return view('gastos.index', compact('gastos'));
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
        Gasto::create($request->all());
        return back()->with('flash','Se Cargaron los gastos correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show(Gasto $gasto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit(Gasto $gasto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasto $gasto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gasto $gasto)
    {
        //
    }
}
