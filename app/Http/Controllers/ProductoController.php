<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //Definimos nuestra vista
         $productos = Producto::all();
         return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::where('tipo_cat','producto')->get();
        return view('productos.create', compact('categorias'));
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
            'nombre' => 'required|min:5',
            'precio' => 'required',
            'descripcion' => 'required|min:5',
            'stock' => 'required',
            'categoria' => 'required|not_in:Elegir'
        ];
        $this->validate($request, $rules);

        Producto::create([
            'nombre' => $request->get('nombre'),
            'precio' => $request->get('precio'),
            'descripcion' => $request->get('descripcion'),
            'calificacion' => 0,
            'stock' => $request->get('stock'),
            'imagen' => 'https://via.placeholder.com/640x480.png/00bb99?text=aspernatur',
            'negocios_id' => Negocio::all()->random()->id,
            'categorias_id' => $request->get('categoria')
           ]);
           return back()->with('success','El producto se ha creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categoria::where('tipo_cat','producto')->get();
        $producto = Producto::find($id);
        return view('productos.edit', compact('producto','categorias'));
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
        $producto = Producto::find($id);

        $rules = [
            'nombre' => 'required|min:5',
            'precio' => 'required',
            'descripcion' => 'required|min:5',
            'stock' => 'required',
            'categoria' => 'required|not_in:Elegir'
        ];

        $this->validate($request, $rules);



       $producto->update([
        'nombre' => $request->get('nombre'),
        'precio' => $request->get('precio'),
        'descripcion' => $request->get('descripcion'),
        'stock' => $request->get('stock'),
        'categorias_id' => $request->get('categoria')
       ]);

       return back()->with('success','El producto se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
