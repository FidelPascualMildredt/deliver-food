<?php

namespace App\Http\Controllers\Api;

use App\Models\Tipo_usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_usuario= Tipo_usuario::all();
        return Response()->json(['tipo_usuarios'=>$tipo_usuario],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tipo_usuario::create([
            'nombre' => $request->get('nombre'),

           ]);
           return ('El Tipo de Usuario se a creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_usuario = Tipo_usuario::find($id);

        return Response()->json($tipo_usuario,200);
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
        $tipo_usuario = Tipo_usuario::find($id);

        $tipo_usuario->update([
         'nombre' => $request->get('nombre'),
        ]);

        return ('El Tipo de Usuario se a actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_usuario = Tipo_usuario::findOrFail($id);
        $tipo_usuario->delete();
        return ('el Tipo de Usuario se elimino de manera correcta');
    }
}
