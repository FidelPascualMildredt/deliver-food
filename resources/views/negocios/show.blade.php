@extends('layouts.dashboard.app')
@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detalle de Negocios
            </h6>
        </div>
        <div class="card-body">
            <h5 class="card-title">Nombre: {{$negocios->nombre}}</h5>
            <h5 class="card-title">Direccion: {{$negocios->direccion}}</h5>
            <h5 class="card-title">Correo: {{$negocios->correo}}</h5>
            <h5 class="card-title">Telefono: {{$negocios->telefono}}</h5>
            <h5 class="card-title">Calificacion: {{$negocios->calificacion}}</h5>
            <h5 class="card-title">Categorias_id: {{$negocios->categorias_id}}</h5>
            <a href="{{ route('negocio.index') }}"  class="btn btn-success mt-2">
                Regresar
            </a>
        </div>
    </div>
@endsection
