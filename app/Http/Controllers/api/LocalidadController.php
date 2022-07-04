<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Localidad;
use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localidad = Localidad::all();
        return response()->json([
            "status" => 1,
            "msg" => "Lista de Localidades",
            "data" => $localidad
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
            'nombre' => 'required|string|max:40',
            'gps'=>'required',
            'direccion'=>'required',
            'capacidad'=>'required'
        ]);

        $localidad = Localidad::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "La localidad fue creada exitosamente",
            "data" => $localidad
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
        
        $localidad = Localidad::all()->find($id);
        if (isset($localidad)) {
            return response()->json([
                "status" => 1,
                "msg" => "¡Localidad encontrado exitosamente!",
                "data" => $localidad
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, localidad no encontrado!'
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
        $localidad = Localidad::all()->find($id);
        if (isset($localidad)) {
            $request->validate([
                'nombre' => 'required|string|max:40',
                'gps'=>'required',
                'direccion'=>'required',
                'capacidad'=>'required'
            ]);

            $localidad->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "¡Localidad actualizado exitosamente!",
                "data" => $localidad
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo localidad no encontrado!'
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
        $localidad = Localidad::all()->find($id);
        if (isset($localidad)) {
            $localidad->delete();
            return response()->json([
                "status" => 1,
                "msg" => "¡Localidad eliminado exitosamente!",
                "data" => $localidad
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo localidad no encontrado!'
            ], 404);
        }
    }
}
