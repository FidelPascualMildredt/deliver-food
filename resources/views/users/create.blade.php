@extends('layouts.dashboard.app')
@section('container')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Crear nuevo Usuario
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('users.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingresa el nombre" value="{{old('nombre')}}">
                @error('nombre')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Nickname</label>
                <input type="text" name="nickname" class="form-control" placeholder="Ingresa el nickname" value="{{old('nickname')}}">
                @error('nickname')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control" placeholder="Ingresa tucorreo" value="{{old('correo')}}">
                @error('correo')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Telefono</label>
                <input type="text" name="telefono" maxlength="10" class="form-control" placeholder="Ingresa numero de telefono" value="{{old('telefono')}}">
                @error('telefono')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="contrasena" class="form-control" placeholder="Ingresa contraseña" value="{{old('contrasena')}}">
                @error('contrasena')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Tipo de Usuario</label>
                <select class="form-control form-select" name="tipo_usuarios_id">
                    <option value="Elegir" {{old('tipo_usuarios_id' ? '' : 'selected')}}>Seleccione tipo de usuario</option>
                    @foreach ($tipo_usuarios as $tipo_usuario)
                    <option value="{{$tipo_usuario->id}}" {{old('tipo_usuarios_id') == $tipo_usuario->id ? 'selected' : ''}}>{{$tipo_usuario->nombre}}</option>
                    @endforeach
                </select>
                @error('tipo_usuarios_id')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            <a href="{{ route('users.index') }}"  class="btn btn-success mt-2">
                Regresar
            </a>
        </form>
    </div>
</div>




@endsection
