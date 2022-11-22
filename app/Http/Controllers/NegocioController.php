<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use App\Models\Categoria;
use Illuminate\Http\Request;

class NegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //Definimos nuestra vista
         $negocios = Negocio::paginate(5);
        //  dd($negocios);
         return view('negocios.index',compact('negocios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::where('tipo_cat','negocio')->get();
        return view('negocios.create', compact('categorias'));
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
            'nombre' => "required|unique:negocios|min:5",
            'direccion'=> "required|unique:negocios",
            'correo'=> "required|unique:negocios|email",
            'telefono' => 'required|numeric:users',
            // 'telefono'=> "required|unique:negocios",
            'categoria'=> "required|not_in:Elegir"

        ];
        $this->validate($request, $rules);

        Negocio::create([
            'nombre' => $request->get('nombre'),
            'direccion' => $request->get('direccion'),
            'correo' => $request->get('correo'),
            'telefono' => $request->get('telefono'),
            'calificacion' => 0,
            'categorias_id' => $request->get('categoria')
        ]);
           return back()->with('success','El negocio se ha creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          // $categorias = Categoria::all();

        // $categorias = Categoria::where('tipo_cat','negocio')->get();
        $negocios = Negocio::find($id);
        // return view('negocios.show', compact('categorias'));
        return view('negocios.show', compact('negocios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $negocios = Negocio::find($id);
        return view('negocios.edit', compact('negocios'));
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
        $negocios = Negocio::find($id);

        $rules = [

        //     // 'nombre' => "required|unique:negocio,nombre,{$negocio->id}|min:5",
        //     'nombre' => "required|unique:negocios{$negocio->id}|min:5",
        //     'direccion'=> "required|unique:negocios{$negocio->id}",
        //     'correo'=> "required|unique:negocios{$negocio->id}|email",
        //     'telefono'=> "required|unique:negocios{$negocio->id}",
        //     'calificacion'=> "calificacion{$negocio->id}",
        //     'categoria'=> "required|not_in:Elegir{$negocio->id}"
        'nombre' => "required:negocios|min:5",
        'direccion'=> "required:negocios",
        'correo'=> "required:negocios|email",
        'telefono' => 'required|numeric:users',
        // 'telefono'=> "required|unique:negocios",
        'categoria'=> "required|not_in:Elegir"
        ];

        $this->validate($request, $rules);

        $negocios->update([

        'nombre' => $request->get('nombre'),
        'direccion' => $request->get('direccion'),
        'correo' => $request->get('correo'),
        'telefono' => $request->get('telefono'),
        'calificaion' => $request->get('calificacion'),
        'categoria' => $request->get('categoria_id'),

    ]);

    return back()->with('success','El negocio se a actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $negocios = Negocio::findOrFail($id);
        $negocios->delete();
        return back()->with('error','El negocio se a eliminado');
    }
}
