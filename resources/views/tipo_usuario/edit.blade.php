@extends('layouts.dashboard.app')
@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Editar Tipo Usuario
            </h6>
        </div>
        <div class="card-body">

            <form action="{{ route('tipo_usuario.update', ['tipo_usuario'=> $tipo_usuario->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingresa el nombre" value="{{ old('nombre') ? old('nombre') : $tipo_usuario->nombre}}">
                    @error('nombre')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
                <a href="{{ route('tipo_usuario.index') }}"  class="btn btn-success mt-2">
                    Regresar
                </a>
            </form>
        </div>
    </div>


@endsection
