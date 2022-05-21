<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movimientos;

class Reportes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entradas = null;
        $entradas = Movimientos::where('tipo', '=', 1)
                    ->join('etiquetas','movimientos.tipo','=','etiquetas.tipo')
                    ->select('etiquetas.nombre',Movimientos::raw('SUM(movimientos.monto) as ToTalIngresos'))
                    ->orderBy('nombre', 'desc')
                    ->get();

        $salidas = null;
        $salidas = Movimientos::where('tipo', '=', 0)
                    ->join('etiquetas','movimientos.tipo','=','etiquetas.tipo')
                    ->select('etiquetas.nombre',Movimientos::raw('SUM(movimientos.monto) as ToTalIngresos'))
                    ->orderBy('nombre', 'desc')
                    ->get();

        //var_dump($entradas);
        //dd($salidas);

        return view('reportes.index',compact([$entradas=>'entradas'],'salidas'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
