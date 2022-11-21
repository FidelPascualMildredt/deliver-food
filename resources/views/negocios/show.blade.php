@extends('layouts.dashboard.app')
@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detalle de Negocios
            </h6>
        </div>
        <div class="card-body">
            <h5 class="card-title">Nombre: {{$negocio->nombre}}</h5>
            <h5 class="card-title">Direccion: {{$negocio->direccion}}</h5>
            <h5 class="card-title">Correo: {{$negocio->correo}}</h5>
            <h5 class="card-title">Telefono: {{$negocio->telefono}}</h5>
            <h5 class="card-title">Calificacion: {{$negocio->calificacion}}</h5>
            <h5 class="card-title">Categorias_id: {{$negocio->categorias_id}}</h5>
            <a href="{{ route('negocio.index') }}"  class="btn btn-success mt-2">
                Regresar
            </a>
        </div>
    </div>
@endsection
