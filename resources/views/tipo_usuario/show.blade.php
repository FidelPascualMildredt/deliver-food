@extends('layouts.dashboard.app')
@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detalle de Tipo de Usuario
            </h6>
        </div>
        <div class="card-body">
            <h5 class="card-title">Nombre: {{$tipo_usuario->nombre}}</h5>
            <a href="{{ route('tipo_usuario.index') }}"  class="btn btn-success mt-2">
                Regresar
            </a>
        </div>
    </div>
@endsection
