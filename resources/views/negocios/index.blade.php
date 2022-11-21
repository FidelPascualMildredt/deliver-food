@extends('layouts.dashboard.app')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Negocios</h1>

    <a href="{{ route('negocio.create') }}" title="Agregar nuevo negocio" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus"></i>
        Agregar
    </a>
</div>
    {{--  Se manada a  llamar un cmponente  --}}
    <x-table titulo="Lista de negocios">
        <x-slot name='encabezado'>
            <th>#
            </th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Calificacion</th>
            <th>Categorias_id</th>
            <th>Opciones</th>
        </x-slot>
        <x-slot name='cuerpo'>
            @foreach ($negocio as $negocio)
                <tr>
                    <td>{{ $negocio->id }}</td>
                    <td>{{ $negocio->nombre }}</td>
                    <td>{{ $negocio->direccion }}</td>
                    <td>{{ $negocio->correo }}</td>
                    <td>{{ $negocio->telefono }}</td>
                    <td>{{ $negocio->calificacion }}</td>
                    <td>{{ $negocio->categorias_id}}</td>
                    <td>


                        <a href="{{ route('negocio.edit', ['negocio'=> $negocio->id]) }}" class="btn btn-success btn-circle btn-sm" title="Editar negocio">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('negocio.show', ['negocio'=> $negocio->id]) }}" class="btn btn-info btn-circle btn-sm" title="Ver negocio">
                            <i class="fas fa-eye"></i>
                        </a>
                        {{--  < href="#" class="btn btn-danger btn-circle btn-sm" title="Eliminar negocio">
                            <i class="fas fa-trash"></i>  --}}
                            <form action="negocio/{{$negocio->id}}" method="POST">
                                @csrf
                                 @method("delete")
                                         <button  class="btn btn-danger btn-circle btn-sm" title="Eliminar negocio">
                                      <i class="fas fa-trash"></i></button>

                                     {{--  <button class="btn btn-danger m-3" type="submit"><i class="fa-solid fa-trash"></i></button>  --}}
                                </form>

                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>
{{--  revisar porque no me agarra  --}}
    {{--  {{$negocio->links()}}  --}}

@endsection
