@extends('layouts.dashboard.app')
@section('container')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Detalle de pedido
        </h6>
    </div>

    <div class="card-body">

        <div class="card">
            <div class="card-header">
              Información
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-3">
                            <h5 class="card-title">Negocio</h5>
                            <p class="card-text">{{$pedido->negocio->nombre}}</p>
                        </div>
                        <div class="col-md-6 col-sm-3">
                            <h5 class="card-title">Cliente</h5>
                            <p class="card-text">{{$pedido->cliente->nombre}}</p>
                        </div>

                        <div class="col-12 mt-4">
                            <h5 class="card-title">Repartidor</h5>
                            <p class="card-text">{{$pedido->repartidor->nombre}}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card mt-2">
            <div class="card-header">
              Detalle de pedido
            </div>
            <div class="card-body">
                <h6 class="mb-2">Agregar producto al pedido</h6>
                <form action="{{ route('pedidos.store') }}" method="POST">
                    @method('POST')
                    @csrf

                    <div class="row">

                        <div class="col-md-6 col-sm-12 form-group">
                            <label>Productos</label>
                            <select class="form-control form-select" name="producto_id">
                                <option value="Elegir" {{old('producto_id' ? '' : 'selected')}}>Seleccione un prodcuto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{$producto->id}}" {{old('producto_id') == $producto->id ? 'selected' : ''}}>{{$producto->nombre}}</option>
                                @endforeach
                            </select>
                            @error('producto_id')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12 form-group">
                          <label>Cantidad</label>
                          <input type="number" class="form-control" name="cantidad" value="1">
                        </div>

                        <div class="col-12 form-group">
                            <label>Comentario</label>
                            <textarea class="form-control" name="comentario" rows="2"></textarea>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary mt-2">Agregar producto</button>
                </form>

                <hr>
                <h6 class="mt-4">Productos pedidos</h6>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">P/U</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total</th>
                        <th scope="col">Comentario</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($productos_pedido as $producto)
                        <tr>

                            <td>{{$producto->}}</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Aun no tiene productos agregados</td>
                        </tr>
                        @endforelse


                    </tbody>
                  </table>

            </div>
        </div>






        {{--  <form action="{{ route('pedidos.store') }}" method="POST">
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
        </form>  --}}
    </div>
</div>
@endsection
