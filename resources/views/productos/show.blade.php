@extends('layouts.dashboard.app')
@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detalle los Productos
            </h6>
        </div>
        <div class="card-body">
            <h5 class="card-title">Nombre: {{$producto->nombre}}</h5>
            <h5 class="card-title">Precio: {{$producto->precio}}</h5>
            <h5 class="card-title">Descripcion: {{$producto->descripcion}}</h5>
            <h5 class="card-title">Calificacion: {{$producto->calificacion}}</h5>
            <h5 class="card-title">Stock: {{$producto->stock}}</h5>
            <h5 class="card-title">Imagen: {{$producto->imagen}}</h5>
            <h5 class="card-title">Negocio_id: {{$producto->negocios->nombre}}</h5>
            <h5 class="card-title">Categoria_id: {{$producto->categorias->nombre}}</h5>
            <a href="{{ route('productos.index') }}"  class="btn btn-success mt-2">
                Regresar
            </a>
        </div>
    </div>
@endsection
