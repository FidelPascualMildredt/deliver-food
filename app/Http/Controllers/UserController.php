<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Tipo_usuario;
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
         //Definimos nuestra vista
        // return User::all();
        $users = User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_usuarios = Tipo_usuario::whereIn('id',[2,3])->get();

        return view('users.create', compact('tipo_usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|unique:users,nombre|min:5',
            'nickname' => 'required|unique:users,nickname|max:10',
            'correo' => 'required|unique,email',
            'telefono' => 'required|unique|numeric|max:10',
            'contrasena'=>  "required|min:8|max:30|same:password",
            'tipo_usuarios_id' => 'required',


        ];
        $this->validate($request, $rules);

        User::create([
            'nombre' => $request->get('nombre'),
            'nickname' => $request->get('nickname'),
            'correo' => $request->get('correo'),
            'telefono' => $request->get('telefono'),
            'foto_perfil' => 'https://via.placeholder.com/640x480.png/00bb99?text=aspernatur',
            'contrasena' => bcrypt($request->get('contrasena')),
            'tipo_usuarios_id' => $request->get('tipo_usuarios_id')



           ]);
           return back()->with('success','El Usuario se a creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        // dd($users);
        return view('users.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_usuarios = Tipo_usuario::all();
        $users = User::find($id);

        return view('users.edit', compact('users','tipo_usuarios'));
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
        $rules = [
            'nombre' => 'required|unique:users,nombre|min:5',
            'nickname' => 'required|unique:users,nickname|max:10',
            'correo' => 'required|unique,correo',
            'telefono' => 'requered|unique',
            'contrasena' => 'requered|unique,contrasena',
        ];
        $this->validate($request, $rules);

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
        $users = User::findOrFail($id);
        $users->delete();
        return back()->with('error','El usuario se a eliminado');
    }
}
