<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = Sector::all();
        return response()->json([
            "status" => 1,
            "msg" => "Lista de Sectores",
            "data" => $sectors
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
            'nombre'=>'required|string|',
            'capacidad'=>'required',
            'localidad_id'=>'required'
        ]);

        $sector = Sector::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "El sector fue creada exitosamente",
            "data" => $sector
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
        $sector = Sector::all()->find($id);
        if (isset($sector)) {
            return response()->json([
                "status" => 1,
                "msg" => "¡Sector encontrado exitosamente!",
                "data" => $sector
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
        $sector = Sector::all()->find($id);
        if (isset($sector)) {
            $request->validate([
                'nombre' => 'required|string|max:40',
                'gps'=>'required',
                'direccion'=>'required',
                'capacidad'=>'required'
            ]);

            $sector->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "¡Localidad actualizado exitosamente!",
                "data" => $sector
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
        $sector = Sector::all()->find($id);
        if (isset($sector)) {
            $sector->delete();
            return response()->json([
                "status" => 1,
                "msg" => "¡Sector eliminado exitosamente!",
                "data" => $sector
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, sector no encontrado!'
            ], 404);
        }
    }
}
