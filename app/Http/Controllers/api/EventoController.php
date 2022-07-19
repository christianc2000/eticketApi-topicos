<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Image;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::all();
        $ev = new Collection();
    foreach ($eventos as $evento ) {
        $evento=Evento::all()->find($evento->id);
        $evento->categoria;
        $ev->push($evento);
    }
        return response()->json([
            "status" => 1,
            "msg" => "Lista de Eventos",
            "data" => $ev
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
            'title' => 'required|string',
            'description' => 'required',
            'publicado' => 'boolean',
            'categoria_id' => 'required',
            'foto' =>  'required|mimes:jpg,jpeg,bmp,png|max:2048',
        ]);

        $evento = Evento::create($request->all());
        if ($request->hasFile('foto')) {

            $folder = "public/perfil";
            $imagen = $request->file('foto')->store($folder); //Storage::disk('local')->put($folder, $request->image, 'public');
            $url = Storage::url($imagen);
            $imagen=Image::create([
                 'image'=>$url,
                 'imageable_id'=>$evento->id,
                 'imageable_type'=> Evento::class
            ]);
        }

        return response()->json([
            "status" => 1,
            "msg" => "El evento fue creado exitosamente",
            "data" => $evento,
            "image" => $imagen->url
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

        $evento = Evento::all()->find($id);
        $evento->categoria;
        
        if (isset($evento)) {
            return response()->json([
                "status" => 1,
                "msg" => "¡Evento encontrado exitosamente!",
                "data" => $evento
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, evento no encontrado!'
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
        $evento = Evento::all()->find($id);
        if (isset($evento)) {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required',
                'publicado' => 'boolean',
                'categoria_id' => 'required'
            ]);

            $evento->update($request->all());
            return response()->json([
                "status" => 1,
                "msg" => "¡Evento actualizado exitosamente!",
                "data" => $evento
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, evento no encontrado!'
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

        $evento = Evento::all()->find($id);
        if (isset($evento)) {
            $evento->delete();
            return response()->json([
                "status" => 1,
                "msg" => "¡Evento eliminado exitosamente!",
                "data" => $evento
            ], 200);
        } else {
            return response()->json([
                "status" => 0,
                'msg' => '¡Fallo, evento no encontrado!'
            ], 404);
        }
    }
}
