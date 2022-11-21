@extends('layouts.dashboard.app')
@section('container')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Nuevo pedido
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('pedidos.store') }}" method="POST">
            @method('POST')
            @csrf

            <div class="form-group">
                <label>Negocio</label>
                <select class="form-control form-select" name="negocios_id">
                    <option value="Elegir" {{old('negocios_id' ? '' : 'selected')}}>Seleccione un negocio</option>
                    @foreach ($negocios as $negocio)
                    <option value="{{$negocio->id}}" {{old('negocios_id') == $negocio->id ? 'selected' : ''}}>{{$negocio->nombre}}</option>
                    @endforeach
                </select>
                @error('negocios_id')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>


            <div class="form-group">
                <label>Cliente</label>
                <select class="form-control form-select" name="cliente_id">
                    <option value="Elegir" {{old('cliente_id' ? '' : 'selected')}}>Seleccione un cliente</option>
                    @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}" {{old('cliente_id') == $cliente->id ? 'selected' : ''}}>{{$cliente->nombre}}</option>
                    @endforeach
                </select>
                @error('cliente_id')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Repartidor</label>
                <select class="form-control form-select" name="repartidor_id">
                    <option value="Elegir" {{old('repartidor_id' ? '' : 'selected')}}>Seleccione un repartidor</option>
                    @foreach ($repartidores as $repartidor)
                    <option value="{{$repartidor->id}}" {{old('repartidor_id') == $repartidor->id ? 'selected' : ''}}>{{$repartidor->nombre}}</option>
                    @endforeach
                </select>
                @error('repartidor_id')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary mt-2">Siguiente</button>
            <a href="{{ route('pedido.index') }}"  class="btn btn-success mt-2">
                Regresar
            </a>
        </form>
    </div>
</div>
@endsection
