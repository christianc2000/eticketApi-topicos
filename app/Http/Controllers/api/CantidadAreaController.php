<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\CantidadArea;
use App\Models\Fecha;
use Illuminate\Http\Request;

class CantidadAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ca = CantidadArea::all();
        return response()->json([
            "status" => 1,
            "msg" => "Lista de cantidad-area",
            "data" => $ca
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
            'cantidad' => 'required|integer',
            'stock' => 'required|integer',
            'precio' => 'required',
            'cantidad_individual' => 'required|integer',
            'prefijo' => 'required|string',
            'id_padre' => 'required|integer',
            'id_hijo' => 'required|integer',
            'fecha_id' => 'required|integer'
        ]);

        $ca = CantidadArea::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "La cantidad área fue creada exitosamente",
            "data" => $ca
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
        $ca = CantidadArea::all()->find($id);
        $P=$ca->areaP;
        $H=$ca->areaH;
        $F=$ca->fecha;
        if (isset($ca)) {
            return response()->json([
                "status" => 1,
                "msg" => "¡Cantidad área encontrado exitosamente!",
                "data" => $ca
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, cantidad área no encontrado!'
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
        $ca = CantidadArea::all()->find($id);
        if (isset($ca)) {
            $request->validate([
                'cantidad' => 'required|integer',
                'stock' => 'required|integer',
                'precio' => 'required',
                'cantidad_individual' => 'required|integer',
                'prefijo' => 'required|string',
                'id_padre' => 'required|integer',
                'id_hijo' => 'required|integer',
                'fecha_id' => 'required|integer'
            ]);
            $ca->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "Cantidad área actualizada exitosamente",
                "data" => $ca
            ]);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, cantidad área no encontrado!'
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
        $ca = Fecha::all()->find($id);
        if (isset($ca)) {
            $ca->delete();
            return response()->json([
                "status" => 1,
                "msg" => "¡Cantidad área eliminada exitosamente!",
                "data" => $ca
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, cantidad área no encontrado!'
            ], 404);
        }
    }
}
