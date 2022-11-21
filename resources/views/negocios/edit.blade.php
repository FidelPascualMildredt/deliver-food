@extends('layouts.dashboard.app')
@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Editar Negocio
            </h6>
        </div>
        <div class="card-body">

            <form action="{{ route('negocio.update', ['negocio'=> $negocio->id]) }}" method="POST">
                @method('PUT')
                @csrf
                {{--  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingresa el nombre" value="{{ old('nombre') ? old('nombre') : $tipo_usuario->nombre}}">
                    @error('nombre')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>  --}}



                {{--  checar  --}}
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingresa el nombre" value="{{old('nombre') ? old('nombre') : $negocio->nombre}}">
                    @error('nombre')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Direccion</label>
                    <input type="text" name="direccion" class="form-control" placeholder="Ingresa la direccion" value="{{old('direccion') ? old('direccion') : $negocio->direccion}}">
                    @error('direccion')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Correo</label>
                    <input type="email" name="correo" class="form-control" placeholder="Ingresa el correo" value="{{old('correo') ? old('correo') : $negocio->correo}}">
                    @error('correo')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Telefono</label>
                    <input type="Tel" name="telefono" class="form-control" placeholder="Ingresa el telefono" value="{{old('telefono') ? old('telefono') : $negocio->telefono}}">
                    @error('telefono')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Calificacion</label>
                    <input type="number" name="calificacion" class="form-control" placeholder="Ingresa la calificacion" value="{{old('calificacion') ? old('calificacion') : $negocio->calificacion}}">
                    @error('calificacion')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                {{--    --}}


                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
                <a href="{{ route('negocio.index') }}"  class="btn btn-success mt-2">
                    Regresar
                </a>
            </form>
        </div>
    </div>
    @endsection
