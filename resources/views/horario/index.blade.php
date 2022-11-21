@extends('layouts.dashboard.app')
@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Horario</h1>
    <a href="{{ route('horario.create') }}" title="Agregar nueva Horario" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus"></i>
        Agregar
    </a>
</div>
<x-table titulo="Lista de Horario">
    <x-slot name='encabezado'>
        <th>#
        </th>
        <th>Nombre</th>
    </x-slot>
    <x-slot name='cuerpo'>
        @foreach ($horarios as $horario)
            <tr>
                <td>{{ $horario->id }}</td>
                <td>{{ $horario->dia }}</td>
                <td>{{ $horario->hora_inicio }}</td>
                <td>{{ $horario->hora_final }}</td>

                <td>


                    <a href="{{ route('horario.edit', ['horario'=> $horario->id]) }}" class="btn btn-success btn-circle btn-sm" title="Editar Horario">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('horario.show', ['horario'=> $horario->id]) }}" class="btn btn-info btn-circle btn-sm" title="Ver Horario">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-circle btn-sm" title="Eliminar Horario">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-table>
@endsection
