<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
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
        $categorias = Categoria::paginate(5);
        return view('categoria.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
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
            'nombre' => 'required|unique:categorias,nombre|min:5',
            'tipo' => 'required|in:producto,negocio',
        ];

        $messages = [
            'nombre.required' => 'El nombre de la categoría es requerido',
            'nombre.unique' => 'La caegoria ya existe',
            'nombre.min' => 'El nombre de la categoría debe de ser más de 5 caracteres',
            'tipo.required' => 'Seleccione un tipo para la categoría',
            'tipo.in' => 'Seleccione un campo permitido',
        ];

        $this->validate($request, $rules, $messages);

        // $categoria_nueva = new Categoria();
        // $categoria_nueva->nombre = $request->get('nombre');
        // $categoria_nueva->tipo_cat = $request->get('tipo');
        // $categoria_nueva->save();


       Categoria::create([
        'nombre' => $request->get('nombre'),
        'cantidad' => 0,
        'tipo_cat' => $request->get('tipo')
       ]);

       return back()->with('success','La categoría se a creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('categoria.edit', compact('categoria'));
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
        $categoria = Categoria::find($id);


        $rules = [
            'nombre' => "required|unique:categorias,nombre,{$categoria->id}|min:5",
            'tipo' => 'required|in:producto,negocio',
        ];

        $messages = [
            'nombre.required' => 'El nombre de la categoría es requerido',
            'nombre.unique' => 'La categoria ya existe',
            'nombre.min' => 'El nombre de la categoría debe de ser más de 5 caracteres',
            'tipo.required' => 'Seleccione un tipo para la categoría',
            'tipo.in' => 'Seleccione un campo permitido',
        ];

        $this->validate($request, $rules, $messages);

        // $categoria->nombre =  $request->get('nombre');
        // $categoria->tipo_cat =  $request->get('tipo');
        // $categoria->save();

       $categoria->update([
        'nombre' => $request->get('nombre'),
        'tipo_cat' => $request->get('tipo')
       ]);

       return back()->with('success','La categoría se a actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return back()->with('error','La categoría se a eliminado');
    }
}
