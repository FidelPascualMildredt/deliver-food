<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Negocio;
use App\Models\Producto;
use App\Models\User;
use App\Models\Detalle_Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              //Definimos nuestra vista
        // return Pedido::all();
        $pedidos = Pedido::all();
        return view('pedido.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $negocios = Negocio::all();
        $clientes = User::where('tipo_usuarios_id',3)->get();
        $repartidores = User::where('tipo_usuarios_id',2)->get();

        return view('pedido.create',compact('negocios','clientes','repartidores'));
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
            'negocios_id' => 'required|not_in:Elegir',
            'cliente_id' => 'required|not_in:Elegir',
            'repartidor_id' => 'required|not_in:Elegir',
            // 'precio' => 'required',
            // 'subtotal' => 'required',
            // 'total' => 'required',
            // 'fecha' => 'required',
            // 'comentario' => 'required|min:5',
        ];
        $this->validate($request, $rules);

        $pedido = New Pedido($request->all());
        $pedido->save();

        return redirect()->route('pedidos.detalle',$pedido);

        // Pedido::create([

        //     'negocios_id' => Negocio::all()->random()->id,
        //     'cliente_id' => User::all()->random()->id,
        //     'repartidor_id' => User::all()->random()->id,
        //     // 'cliente_id' => $request->get('cliente'),
        //     // 'reapartidor_id' => $request->get('repartidor'),
        //     'precio' => $request->get('precio'),
        //     'subtotal' => $request->get('subtotal'),
        //     'total' => $request->get('total'),
        //     'fecha' => $request->get('total'),
        //     'comentario' => $request->get('comentario'),

        //    ]);
    }
    public function DetallePedido($id){
        $pedido = Pedido::find($id);
        // dd($pedido);
        $productos = Producto::where('negocios_id',$pedido->negocios_id)->get();
        $productos_pedido = Detalle_Pedido::where('pedidos_id',$pedido->id)->get();
        // dd($productos_pedido);
        return view('pedido.detalle', compact('pedido','productos','productos_pedido'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedidos = Pedido::find($id);
        return view('pedido.show', compact('pedidos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $negocio = Negocio::where('negocio','pedido')->get();
        $cliente = User::where('cliente','pedido')->get();
        $reapartidor = User::where('repartidor','pedido')->get();
        $pedidos = Pedido::find($id);
        return view('pedido.edit', compact('pedido','negocio','cliente','repartidor'));
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
        $pedidos = Pedido::find($id);

        $rules = [
            'negocio' => 'required|not_in:Elegir',
            'cliente' => 'required|not_in:Elegir',
            'repartidor' => 'required|not_in:Elegir',
            'precio' => 'required',
            'subtotal' => 'required',
            'total' => 'required',
            'fecha' => 'required',
            'comentario' => 'required|min:5',
        ];

        $this->validate($request, $rules);

       $pedidos->update([
        'negocio_id' => $request->get('negocio'),
        'cliente_id' => $request->get('cliente'),
        'repartidor_id' => $request->get('repartidor'),
        'precio' => $request->get('precio'),
        'subtotal' => $request->get('subtotal'),
        'total' => $request->get('total'),
        'fecha' => $request->get('fecha'),
        'comentario' => $request->get('comentario'),

       ]);

       return back()->with('success','El pedido se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        return back()->with('error','El pedido se a eliminado');
    }
}
