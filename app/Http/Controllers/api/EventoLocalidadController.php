<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\EventoLocalidad;
use App\Models\Localidad;
use Illuminate\Http\Request;

class EventoLocalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $el = EventoLocalidad::all();
        return response()->json([
            "status" => 1,
            "msg" => "Lista de Evento-Localidad",
            "data" => $el
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
            'evento_id' => 'required|integer',
            'localidad_id' => 'required|integer'
        ]);

        $el = EventoLocalidad::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "El evento-localidad fue creado exitosamente",
            "data" => $el
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
        $el = EventoLocalidad::all()->find($id);
        $evento = $el->evento;
        $localidad = $el->localidad;
        if (isset($el)) {
            return response()->json([
                "status" => 1,
                "msg" => "¡Evento-localidad encontrado exitosamente!",
                "data" => $el
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo evento-localidad no encontrado!'
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
        $el = EventoLocalidad::all()->find($id);
        if (isset($el)) {
            $request->validate([
                'evento_id' => 'required|integer',
                'localidad_id' => 'required|integer'
            ]);

            $el->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "¡Evento-localidad actualizado exitosamente!",
                "data" => $el
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, evento-localidad no encontrado!'
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
        $el = EventoLocalidad::all()->find($id);
        if (isset($el)) {
            $el->delete();
            return response()->json([
                "status" => 1,
                "msg" => "¡Evento-localidad eliminado exitosamente!",
                "data" => $el
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, evento-localidad no encontrado!'
            ], 404);
        }
    }
}
