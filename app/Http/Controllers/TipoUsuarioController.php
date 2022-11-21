<?php

namespace App\Http\Controllers;
use App\Models\Tipo_usuario;
use Illuminate\Http\Request;


class TipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //Definimos nuestra vista
         $tipo_usuarios = Tipo_usuario::paginate(5);
         return view('tipo_usuario.index',compact('tipo_usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_usuario.create');
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
            'nombre' => 'required|unique:tipo_usuarios,nombre|min:5',
        ];
        $this->validate($request, $rules);

        Tipo_usuario::create([
            'nombre' => $request->get('nombre'),

           ]);
           return back()->with('success','El Tipo de Usuario se a creado correctamente');
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
        return view('tipo_usuario.show', compact('tipo_usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_usuario = Tipo_usuario::find($id);
        return view('tipo_usuario.edit', compact('tipo_usuario'));
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


        $rules = [
            'nombre' => "required|unique:tipo_usuarios,nombre,{$tipo_usuario->id}|min:5",

        ];

        $this->validate($request, $rules);



       $tipo_usuario->update([
        'nombre' => $request->get('nombre'),
       ]);

       return back()->with('success','El Tipo de Usuario se a actualizado correctamente');
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
        return back()->with('error','El Tipo de Usuario se a eliminado');
    }
}
