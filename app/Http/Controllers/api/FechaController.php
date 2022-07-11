<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Fecha;
use Illuminate\Http\Request;

class FechaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fecha = Fecha::all();
        return response()->json([
            "status" => 1,
            "msg" => "Lista de Fechas",
            "data" => $fecha
        ]);
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
        $request->validate([
            'fecha_evento' => 'required|date',
            'hora' => 'required|time',
            'evento_localidad_id' => 'required|integer',
        ]);

        $fecha = Fecha::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "La fecha fue creada exitosamente",
            "data" => $fecha
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fecha = Fecha::all()->find($id);
        $fecha->eventoLocalidad->evento->categoria;

        if (isset($fecha)) {
            return response()->json([
                "status" => 1,
                "msg" => "¡Fecha encontrada exitosamente!",
                "data" => $fecha
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, fecha no encontrado!'
            ], 404);
        }
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
        $fecha = Fecha::all()->find($id);
        if (isset($fecha)) {
            $request->validate([
                'fecha_evento' => 'required|date',
                'hora' => 'required|time',
                'evento_localidad_id' => 'required|integer',
            ]);
            $fecha->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "Fecha actualizada exitosamente",
                "data" => $fecha
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, fecha no encontrado!'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fecha = Fecha::all()->find($id);
        if (isset($fecha)) {
            $fecha->delete();
            return response()->json([
                "status" => 1,
                "msg" => "¡Fecha eliminado exitosamente!",
                "data" => $fecha
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, fecha no encontrada!'
            ], 404);
        }
    }
}
