@extends('layouts.dashboard.app')
@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Productos</h1>
    <a href="{{ route('productos.create') }}" title="Agregar nueva Producto" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus"></i>
        Agregar
    </a>
</div>
<x-table titulo="Lista de Productos">
    <x-slot name='encabezado'>
        <th>#
        </th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Descripcion</th>
        {{--  <th>Calificacion</th>  --}}
        <th>Stock</th>
        <th>Imagen</th>
        <th>Negocios</th>
        <th>Cátegorias</th>
        <th>Opciones</th>
    </x-slot>
    <x-slot name='cuerpo'>
        @foreach ($productos as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nombre }}</td>
                <td>${{ $item->precio }}</td>
                <td>{{ $item->descripcion }}</td>
                {{--  <td>{{ $item->calificacion }}</td>  --}}
                <td>{{ $item->stock }}</td>
                <td>
                    <img width="150px" height="150px" src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}">
                </td>
<<<<<<< HEAD
                <td>{{ $producto->negocios }}</td>
                <td>{{ $producto->categorias }}</td>
                {{--  <td>{{ $producto->negocios->nombre }}</td>
                <td>{{ $producto->categorias->nombre }}</td>  --}}
=======
                <td>{{ $item->negocios->nombre }}</td>
                <td>{{ $item->categorias->nombre }}</td>
>>>>>>> parent of 2d4e76e (validaciones)

                {{--  <td>{{ $item->negocios_id->nombre }}</td>
                <td>{{ $item->categorias_id->nombre}}</td>  --}}


                <td>


                    <a href="{{ route('productos.edit', ['producto'=> $item->id]) }}" class="btn btn-success btn-circle btn-sm" title="Editar Producto">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('productos.show', ['producto'=> $item->id]) }}" class="btn btn-info btn-circle btn-sm" title="Ver Producto">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-circle btn-sm" title="Eliminar Tipo de Usuario">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-table>
{{$productos->links()}}
@endsection
