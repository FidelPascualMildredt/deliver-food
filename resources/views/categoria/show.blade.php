@extends('layouts.dashboard.app')
@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detalle de categoría
            </h6>
        </div>
        <div class="card-body">
            <h5 class="card-title">Nombre: {{$categoria->nombre}}</h5>
            <p class="card-text">Tipo: {{$categoria->tipo_cat}}</p>
            <p class="card-text">Catidad de {{$categoria->tipo_cat}}s que usan la categoría: {{$categoria->cantidad}}</p>
            <a href="{{ route('categoria.index') }}"  class="btn btn-success mt-2">
                Regresar
            </a>
        </div>
    </div>
@endsection
