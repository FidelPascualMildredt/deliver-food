@extends('layouts.dashboard.app')
@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
    <a href="{{ route('users.create') }}" title="Agregar Usuario" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus"></i>
        Agregar
    </a>
</div>
<x-table titulo="Lista de Usuarios">
    <x-slot name='encabezado'>
        <th>#
        </th>
        <th>Nombre</th>
        <th>Nickname</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Foto de Perfil</th>
        <th>Contraseña</th>
        <th>Tipo de Usuario</th>
        <th>Opciones</th>
    </x-slot>
    <x-slot name='cuerpo'>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->nickname }}</td>
                <td>{{ $user->correo }}</td>
                <td>{{ $user->telefono }}</td>
                <td><img width="150px" height="150px" src="{{ $user->imagen }}" alt="{{ $user->nombre }}"></td>
                <td>{{ $user->contrasena }}</td>
                <td>{{ $user->tipo_usuarios_id}}</td>

                {{--  <td>{{ $user->tipo_usuarios_id }}</td>  --}}

                <td>


                    <a href="{{ route('users.edit', ['user'=> $user->id]) }}" class="btn btn-success btn-circle btn-sm" title="Editar Tipo de Usuario">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('users.show', ['user'=> $user->id]) }}" class="btn btn-info btn-circle btn-sm" title="Ver Tipo de Usuario">
                        <i class="fas fa-eye"></i>
                    </a>

                    {{--  <a href="#" class="btn btn-danger btn-circle btn-sm" title="Eliminar Tipo de Usuario">
                        <i class="fas fa-trash"></i>
                    </a>  --}}
                    <form action=" users/{{$user->id}}" method="POST">
                        @csrf
                         @method("delete")
                                 <button  class="btn btn-danger btn-circle btn-sm" title="Eliminar Usuario">
                              <i class="fas fa-trash"></i></button>
                        </form>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-table>
@endsection
