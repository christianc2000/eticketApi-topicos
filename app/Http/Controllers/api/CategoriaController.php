<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Exception;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json([
            "status" => 1,
            "msg" => "Lista de Categorias",
            "data" => $categorias
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
        ]);

        $categoria = Categoria::create($request->all());
        return response()->json([
            "status" => 1,
            "msg" => "La categoria fue creada exitosamente",
            "data" => $categoria
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
        try {
            $categoria = Categoria::FindOrFail($id);
            return response()->json([
                "status" => 1,
                "msg" => "¡Evento encontrado exitosamente!",
                "data" => $categoria
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo evento no encontrado!'
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


        $categoria = Categoria::all()->find($id);
        if (isset($categoria)) {
            $request->validate([
                'nombre' => 'required|string',
            ]);

            $categoria->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "¡Categoria actualizado exitosamente!",
                "data" => $categoria
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo categoria no encontrado, actualización fallida!'
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

        $categoria = Categoria::all()->find($id);
        if (isset($categoria)) {
            $categoria->delete();
            return response()->json([
                "status" => 1,
                "msg" => "¡Categoria eliminado exitosamente!",
                "data" => $categoria
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "¡Fallo categoria no encontrada!"
            ], 404);
        }
    }
}
