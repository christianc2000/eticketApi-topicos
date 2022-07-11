<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AreaSector;
use Illuminate\Http\Request;

class AreaSectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $as = AreaSector::all();
        return response()->json([
            "status" => 1,
            "msg" => "Lista de área-sectors",
            "data" => $as
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
            'precio' => 'required',
            'color' => 'required|string',
            'sector_id' => 'required|integer',
            'area_id' => 'required|integer',
            'evento_localidad_id' => 'required|integer',
        ]);

        $as = AreaSector::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "El área-sector fue creada exitosamente",
            "data" => $as
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
        $as = AreaSector::all()->find($id);
        $as->area;
        $as->sector;
        $as->eventoLocalidad->evento->categoria;
        $as->eventoLocalidad->localidad;
        if (isset($as)) {
            return response()->json([
                "status" => 1,
                "msg" => "¡Área-sector encontrado exitosamente!",
                "data" => $as
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo área-sector no encontrado!'
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
        $as = AreaSector::all()->find($id);
        if (isset($as)) {
            $request->validate([
                'precio' => 'required',
                'color' => 'required|string',
                'sector_id' => 'required|integer',
                'area_id' => 'required|integer',
                'evento_localidad_id' => 'required|integer',
            ]);

            $as->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "¡Área-sector actualizado exitosamente!",
                "data" => $as
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, área-sector no encontrado!'
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
        $as = AreaSector::all()->find($id);
        if (isset($as)) {
            $as->delete();
            return response()->json([
                "status" => 1,
                "msg" => "¡Área-sector eliminado exitosamente!",
                "data" => $as
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, área-sector no encontrado!'
            ], 404);
        }
    }
}
