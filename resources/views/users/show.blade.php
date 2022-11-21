@extends('layouts.dashboard.app')
@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detalle los Usuario
            </h6>
        </div>
        <div class="card-body">
            <h5 class="card-title">Nombre: {{$users->nombre}}</h5>
            <h5 class="card-title">Nickname: {{$users->nickname}}</h5>
            <h5 class="card-title">Correo: {{$users->correo}}</h5>
            <h5 class="card-title">Telefono: {{$users->telefono}}</h5>
            <h5 class="card-title">Foto de Perfil: {{$users->foto_perfil}}</h5>
            <h5 class="card-title">Contraseña: {{$users->contrasena}}</h5>
            <h5 class="card-title">Tipo de Usuario: {{$users->tipo_usuario->nombre}}</h5>
            <a href="{{ route('users.index') }}"  class="btn btn-success mt-2">
                Regresar
            </a>
        </div>
    </div>
@endsection
