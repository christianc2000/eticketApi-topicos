<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Telefono;
use Illuminate\Http\Request;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telefonos = Telefono::all();
        return response()->json([
            "status" => 1,
            "msg" => "Lista de telefonos",
            "data" => $telefonos
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
            'numero'=>'required',
            'localidad_id'=>'required'
        ]);

        $telefono = Telefono::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "El telefono fue creada exitosamente",
            "data" => $telefono
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
        $telefono = Telefono::all()->find($id);
        if (isset($telefono)) {
            return response()->json([
                "status" => 1,
                "msg" => "¡Telefono encontrado exitosamente!",
                "data" => $telefono
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, sector no encontrado!'
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
        $telefono = Telefono::all()->find($id);
        if (isset($telefono)) {
            $request->validate([
                'numero'=>'required',
                'localidad_id'=>'required'
            ]);

            $telefono->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "¡Telefono actualizado exitosamente!",
                "data" => $telefono
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, telefono no encontrado!'
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
        $telefono = Telefono::all()->find($id);
        if (isset($telefono)) {
            $telefono->delete();
            return response()->json([
                "status" => 1,
                "msg" => "¡Telefono eliminado exitosamente!",
                "data" => $telefono
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, telefono no encontrado!'
            ], 404);
        }
    }
}
