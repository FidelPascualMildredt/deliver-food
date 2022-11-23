<?php

namespace App\Http\Controllers\Api;

use App\Models\Negocio;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos= Producto::all();
        return Response()->json(['productos'=>$productos],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
           return ('El producto se ha creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos = Producto::find($id);

        return Response()->json($productos,200);
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
        $producto->update([
         'nombre' => $request->get('nombre'),
         'precio' => $request->get('precio'),
         'descripcion' => $request->get('descripcion'),
         'stock' => $request->get('stock'),
         'categorias_id' => $request->get('categoria')
        ]);

        return ('El producto se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productos = Producto::findOrFail($id);
        $productos->delete();
        return ('el producto se elimino de manera correcta');
    }
}
