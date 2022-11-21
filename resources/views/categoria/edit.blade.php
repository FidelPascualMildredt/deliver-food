@extends('layouts.dashboard.app')
@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Editar categoría
            </h6>
        </div>
        <div class="card-body">

            <form action="{{ route('categoria.update', ['categorium'=> $categoria->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingresa el nombre" value="{{ old('nombre') ? old('nombre') : $categoria->nombre}}">
                    @error('nombre')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" id="tipo_producto"
                            value="producto" @if(old('tipo')) {{ old('tipo') == 'producto' ? 'checked' : '' }} @else {{ $categoria->tipo_cat == 'producto' ? 'checked' : '' }}@endif >
                        <label class="form-check-label" for="tipo_producto">
                            Producto
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" id="tipo_negocio"
                            value="negocio" @if(old('tipo')) {{ old('tipo') == 'negocio' ? 'checked' : '' }} @else {{ $categoria->tipo_cat == 'negocio' ? 'checked' : '' }}@endif>
                        <label class="form-check-label" for="tipo_negocio">
                            Negocio
                        </label>
                    </div>
                    @error('tipo')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
                <a href="{{ route('categoria.index') }}"  class="btn btn-success mt-2">
                    Regresar
                </a>
            </form>
        </div>
    </div>
@endsection
