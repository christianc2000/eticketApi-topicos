<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Exception;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return response()->json([
            "status" => 1,
            "msg" => "Lista de áreas",
            "data" => $areas
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
            'nombre' => 'required|string|max:20',
            'capacidad' => 'required|integer',
            'nivel' => 'required|integer',
        ]);

        $area = Area::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "El área fue creada exitosamente",
            "data" => $area
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
        $area = Area::all()->find($id);
        
        if (isset($area)) {
            return response()->json([
                "status" => 1,
                "msg" => "¡Área encontrado exitosamente!",
                "data" => $area
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
        $area = Area::all()->find($id);
        if (isset($area)) {
            $request->validate([
                'nombre' => 'required|string|max:20',
                'capacidad' => 'required|integer',
                'nivel' => 'required|integer',
            ]);

            $area->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "¡Área actualizado exitosamente!",
                "data" => $area
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, área no encontrado!'
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
        $area = Area::all()->find($id);
        if (isset($area)) {
            $area->delete();
            return response()->json([
                "status" => 1,
                "msg" => "¡Área eliminado exitosamente!",
                "data" => $area
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, área no encontrado!'
            ], 404);
        }
    }
}
