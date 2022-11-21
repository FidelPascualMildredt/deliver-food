@extends('layouts.dashboard.app')
@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detalle de Pedido
            </h6>
        </div>
        <div class="card-body">
            <h5 class="card-title">Negocio_id: {{$pedidos->negocio_id}}</h5>
            <h5 class="card-title">Cliente_id: {{$pedidos->cliente_id}}</h5>
            <h5 class="card-title">Repartidor_id: {{$pedidos->repartidor_id}}</h5>
            <h5 class="card-title">Precio envio: {{$pedidos->precio_envio}}</h5>
            <h5 class="card-title">Subtotal: {{$pedidos->subtotal}}</h5>
            <h5 class="card-title">Total: {{$pedidos->total}}</h5>
            <h5 class="card-title">Fecha: {{$pedidos->fecha}}</h5>
            <h5 class="card-title">Comentario: {{$pedidos->comentario}}</h5>
            <a href="{{ route('pedido.index') }}"  class="btn btn-success mt-2">
                Regresar
            </a>
        </div>
    </div>
@endsection
