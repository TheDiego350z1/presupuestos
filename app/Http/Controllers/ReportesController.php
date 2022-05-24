<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimientos;
use Mpdf\Mpdf;
use PDF;

use function GuzzleHttp\json_encode;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas = Movimientos::where('movimientos.tipo', '=', 1)
                    ->join('etiquetas','movimientos.etiqueta_id','=','etiquetas.id')
                    ->select('etiquetas.nombre',Movimientos::raw('SUM(movimientos.monto) as TotalIngresos'))
                    ->groupBy('etiquetas.nombre')
                    ->orderBy('nombre', 'desc')
                    ->get();

        $totalEntradas = Movimientos::where('movimientos.tipo', '=', 1)
                        ->sum('monto');

        $salidas = Movimientos::where('movimientos.tipo', '=', 0)
                    ->join('etiquetas','movimientos.etiqueta_id','=','etiquetas.id')
                    ->select('etiquetas.nombre',Movimientos::raw('SUM(movimientos.monto) as TotalEgresos'))
                    ->groupBy('etiquetas.nombre')
                    ->orderBy('nombre', 'desc')
                    ->get();

        $totalSalidas = Movimientos::where('movimientos.tipo', '=', 0)
                        ->sum('monto');

        $balance = $totalEntradas -$totalSalidas;

        $dataSource = Movimientos::select('etiquetas.tipo',Movimientos::raw('SUM(movimientos.monto) as Monto'))
                    ->join('etiquetas','movimientos.etiqueta_id','=','etiquetas.id')
                    ->groupBy('etiquetas.tipo')
                    ->orderBy('tipo', 'desc')
                    ->get();

        $dataGrafico = [];

        foreach ($dataSource as $row){
            if($row->tipo == 0) {
                $dataGrafico['label'][] = 'Egresos';
            }else{
                $dataGrafico['label'][] = 'Ingresos';
            }
            $dataGrafico['data'][] = (int)$row->Monto;
        }

        return view('reportes.index', compact('entradas','salidas','totalEntradas','totalSalidas','balance','dataGrafico'));
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
