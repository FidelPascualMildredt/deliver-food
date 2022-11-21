@extends('layouts.dashboard.app')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pedidos</h1>

    <a href="{{ route('pedidos.create') }}" title="Agregar nuevo negocio" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus"></i>
        Agregar
    </a>
</div>
    {{--  Se manada a  llamar un cmponente  --}}
    <x-table titulo="Lista de negocios">
        <x-slot name='encabezado'>
            <th>#
            </th>
            <th>Negocios_id</th>
            <th>Cliente_id</th>
            <th>Repartidor_id</th>
            <th>precio_envio</th>
            <th>Subtotal</th>
            <th>Total</th>
            <th>fecha</th>
            <th>Comentario</th>
            <th>Opciones</th>
        </x-slot>
        <x-slot name='cuerpo'>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->negocios_id }}</td>
                    <td>{{ $pedido->cliente_id}}</td>
                    <td>{{ $pedido->repartidor_id }}</td>
                    <td>{{ $pedido->precio_envio }}</td>
                    <td>{{ $pedido->subtotal }}</td>
                    <td>{{ $pedido->total}}</td>
                    <td>{{ $pedido->fecha }}</td>
                    <td>{{ $pedido->comentario }}</td>

                    <td>


                        <a href="{{ route('pedidos.edit', ['pedido'=> $pedido->id]) }}" class="btn btn-success btn-circle btn-sm" title="Editar pedido">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('pedidos.show', ['pedido'=> $pedido->id]) }}" class="btn btn-info btn-circle btn-sm" title="Ver pedido">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form action="pedido/{{$pedido->id}}" method="POST">
                            @csrf
                             @method("delete")
                                     <button  class="btn btn-danger btn-circle btn-sm" title="Eliminar pedido">
                                  <i class="fas fa-trash"></i></button>
                            </form>
                        {{--  <a href="#" class="btn btn-danger btn-circle btn-sm" title="Eliminar pedido">
                            <i class="fas fa-trash"></i>
                        </a>  --}}
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>
{{--  revisar porque no me agarra
    {{--  {{$pedido->links()}}  --}}

@endsection



