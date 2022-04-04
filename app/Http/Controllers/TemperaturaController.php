<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//hacer referencia al modelo Temperatura
use App\Models\Temperatura;
use Illuminate\Support\Facades\DB;

class TemperaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $temperaturas=DB::table('temperatura')
                        ->select('num','message','sensor_num','value','recorded')
                        ->where('recorded', 'LIKE','%'.$texto.'%')
                        ->paginate(10);
        return view('auth.search',compact('temperaturas','texto'));
    }

    public function consultaDia()
    {
        $temperatura = DB::select("SET lc_time_names = 'es_MX'");
        $temperatura = DB::select("SELECT * 
        FROM site1.temperatura 
        WHERE recorder between now() 
        - INTERVAL 24 HOUR AND now()");
        
        $datos = array();
        $datos['name'] = 'Temperatura';
        $datos['data'] = [];

        $horas = array();
        $horas = [];

        foreach ($temperatura as $value) {
            array_push($datos['data'],$value->value);
            $objHora = date_create($value->recorder);
            $dataHora = date_format($objHora,'D:H');
            array_push($horas,$dataHora);
        }
        $datosGraficas = array($datos,$horas);
        return json_encode($datosGraficas);
    }

    public function consultaSemana()
    {

        $temperatura = DB::select("SET lc_time_names = 'es_MX'"); 
        $temperatura = $temperatura = DB::select("SELECT 
            dayname(recorder) as 'recorder',
            round(avg(value)) as 'value'
            FROM site1.temperatura 
            WHERE month(recorder) 
            group by day(recorder)");
        $datos2 = array();
        $datos2['name'] = 'Temperatura';
        $datos2['data'] = [];

        $fecha = array();
        $fecha = [];

        foreach ($temperatura as $value) {
            array_push($datos2['data'],$value->value);

            array_push($fecha,$value->recorder);
        }
        $datosGraficas2 = array($datos2,$fecha);
        return json_encode($datosGraficas2);
    }
 
    public function consultaMes(Request $request)
    {
        $temperatura = DB::select("SET lc_time_names = 'es_MX'");
        $temperatura = $temperatura = DB::select("SELECT 
            monthname(recorder) as 'recorder',
            round(value) as 'value'
            FROM site1.temperatura 
            WHERE month(recorder) = '05'
            group by month(recorder)");
        $datos3 = array();
        $datos3['name'] = 'Temperatura';
        $datos3['data'] = [];

        $mes = array();
        $mes = [];

        foreach ($temperatura as $value) {
            array_push($datos3['data'],$value->value);
            array_push($mes,$value->recorder);
        }
        $datosGraficas3 = array($datos3,$mes);
        return json_encode($datosGraficas3);
    }


    public function consultaYear()
    {
        $temperatura = DB::select("SET lc_time_names = 'es_MX'");
        $temperatura = $temperatura = DB::select("SELECT 
            monthname(recorder) as 'recorder',
            round(avg(value)) as 'value'
            FROM site1.temperatura 
            WHERE year(recorder) = '2021'
            group by month(recorder)");
        $datos4 = array();
        $datos4['name'] = 'Temperatura';
        $datos4['data'] = [];

        $mes = array();
        $mes = [];

        foreach ($temperatura as $value) {
            array_push($datos4['data'],$value->value);
            array_push($mes,$value->recorder);
        }
        $datosGraficas3 = array($datos4,$mes);
        return json_encode($datosGraficas3);
    }

    public function consultaCirculo1()
    {
        $valor = 50;
        return $valor;
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
