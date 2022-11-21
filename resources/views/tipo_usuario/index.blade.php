@extends('layouts.dashboard.app')
@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tipo de Usuarios</h1>
    <a href="{{ route('tipo_usuario.create') }}" title="Agregar nueva Tipo Usuario" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus"></i>
        Agregar
    </a>
</div>
<x-table titulo="Lista de Tipo de Usuarios">
    <x-slot name='encabezado'>
        <th>#
        </th>
        <th>Nombre</th>
        <th>Opciones</th>
    </x-slot>
    <x-slot name='cuerpo'>
        @foreach ($tipo_usuarios as $tipo_usuario)
            <tr>
                <td>{{ $tipo_usuario->id }}</td>
                <td>{{ $tipo_usuario->nombre }}</td>

                <td>


                    <a href="{{ route('tipo_usuario.edit', ['tipo_usuario'=> $tipo_usuario->id]) }}" class="btn btn-success btn-circle btn-sm" title="Editar Tipo de Usuario">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('tipo_usuario.show', ['tipo_usuario'=> $tipo_usuario->id]) }}" class="btn btn-info btn-circle btn-sm" title="Ver Tipo de Usuario">
                        <i class="fas fa-eye"></i>
                    </a>
                    <form action=" tipo_usuario/{{$tipo_usuario->id}}" method="POST">
                        @csrf
                         @method("delete")
                                 <button  class="btn btn-danger btn-circle btn-sm" title="Eliminar Tipo de Usuario">
                              <i class="fas fa-trash"></i></button>
                        </form>
                    {{--  <a href="#" class="btn btn-danger btn-circle btn-sm" title="Eliminar Tipo de Usuario">
                        <i class="fas fa-trash"></i>
                    </a>  --}}
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-table>
@endsection
