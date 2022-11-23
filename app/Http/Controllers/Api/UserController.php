<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::all();
        return Response()->json(['users'=>$user],200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'nombre' => $request->get('nombre'),
            'nickname' => $request->get('nickname'),
            'correo' => $request->get('correo'),
            'telefono' => $request->get('telefono'),
            'foto_perfil' => 'https://via.placeholder.com/640x480.png/00bb99?text=aspernatur',
            'contrasena' => bcrypt($request->get('contrasena')),
            'tipo_usuarios_id' => $request->get('tipo_usuarios_id')



           ]);
           return ('El Usuario se a creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return Response()->json($user,200);
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
        $users = User::find($id);
        $users->update([
            'nombre' => $request->get('nombre'),
            'nickname' => $request->get('nickname'),
            'correo' => $request->get('correo'),
            'telefono' => $request->get('telefono'),
            'foto_perfil' => 'https://via.placeholder.com/640x480.png/00bb99?text=aspernatur',
            'contrasena' => bcrypt($request->get('contrasena')),
            'tipo_usuarios_id' => $request->get('tipo_usuarios_id')
           ]);
           return back()->with('success','El Usuario se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return ('el Usuario se elimino de manera correcta');
    }
}
