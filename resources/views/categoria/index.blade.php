@extends('layouts.dashboard.app')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categoría</h1>

    <a href="{{ route('categoria.create') }}" title="Agregar nueva categoría" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus"></i>
        Agregar
    </a>
</div>
    {{--  Se manada a  llamar un componente  --}}
    <x-table titulo="Lista de categorías">
        <x-slot name='encabezado'>
            <th>#
            </th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Opciones</th>
        </x-slot>
        <x-slot name='cuerpo'>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->tipo_cat }}</td>
                    <td>


                        <a href="{{ route('categoria.edit', ['categorium'=> $categoria->id]) }}" class="btn btn-success btn-circle btn-sm" title="Editar categoría">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('categoria.show', ['categorium'=> $categoria->id]) }}" class="btn btn-info btn-circle btn-sm" title="Ver categoría">
                            <i class="fas fa-eye"></i>
                        </a>

                            <form action="categoria/{{$categoria->id}}" method="POST">
                                @csrf
                                        {{--  {!! csrf_field() !!}  --}}
                                 @method("delete")

                                         <button  class="btn btn-danger btn-circle btn-sm" title="Eliminar categoría">
                                      <i class="fas fa-trash"></i></button>

                                     {{--  <button class="btn btn-danger m-3" type="submit"><i class="fa-solid fa-trash"></i></button>  --}}
                                </form>
                        {{--  </a>
                        <a href="#" class="btn btn-danger btn-circle btn-sm" title="Eliminar categoría">
                            <i class="fas fa-trash"></i>
                        </a>  --}}
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>

    {{$categorias->links()}}

@endsection
