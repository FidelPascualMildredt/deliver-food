@extends('layouts.dashboard.app')
@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Editar Pedido
            </h6>
        </div>
        <div class="card-body">

            <form action="{{ route('pedido.update', ['pedido'=> $pedido->id]) }}" method="POST">
                @method('PUT')
                @csrf


                <div class="form-group">
                    <label>Negocio</label>
                    <select class="form-control form-select" name="negocio">
                        <option value="Elegir" >Seleccione un negocio</option>
                        @foreach ($negocios as $negocio)
                        <option value="{{$negocio->id}}" {{$negocio->id == $pedido->negocio_id ? 'selected' : ''}} {{old('negocio') == $negocio->id ? 'selected' : ''}}>{{$negocio->nombre}}</option>
                        @endforeach
                    </select>
                    @error('negocio')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label>Cliente</label>
                    <select class="form-control form-select" name="cliente">
                        <option value="Elegir" >Seleccione un cliente</option>
                        @foreach ($users as $user)
                        <option value="{{$cliente->id}}" {{$cliente->id == $pedido->cliente_id ? 'selected' : ''}} {{old('cliente') == $cliente->id ? 'selected' : ''}}>{{$cliente->nombre}}</option>
                        @endforeach
                    </select>
                    @error('cliente')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label>Repartidor</label>
                    <select class="form-control form-select" name="reapartidor">
                        <option value="Elegir" >Seleccione un reapartidor</option>
                        @foreach ($users as $user)
                        <option value="{{$repartidor->id}}" {{$repartidor->id == $pedido->repartidor_id ? 'selected' : ''}} {{old('repartidor') == $reaprtidor->id ? 'selected' : ''}}>{{$repartidor->nombre}}</option>
                        @endforeach
                    </select>
                    @error('repartidor')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Precio de envio</label>
                    <input type="number" name="precio" class="form-control" placeholder="Ingresa el precio de envio" value="{{ old('precio') ? old('precio') : $pedido->precio}}">
                    @error('precio')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label>Subtotal</label>
                    <input type="number" name="subtotal" class="form-control" placeholder="Ingresa el subtotal" value="{{ old('subtotal') ? old('subtotal') : $pedido->subtotal}}">
                    @error('subtotal')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Total</label>
                    <input type="number" step="any" name="total" class="form-control" placeholder="Ingresa el total" value="{{ old('total') ? old('total') : $pedido->total}}">
                    @error('total')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="start">Fecha:</label>
                    <input type="date" id="start" name="trip-start"  value= "{{old('trip-start') ? old('trip-start') : $pedido->fecha}}" "2022-10-01" min="2022-01-01" max="2022-12-31">
                    @error('trip-start')
                         <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Comentario</label>
                    <input type="text" name="comentario" class="form-control" placeholder="Ingresa una pequeño comentario" value="{{ old('comentario') ? old('comentario') : $pedido->comentario}}">
                    @error('comentario')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>



                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
                <a href="{{ route('productos.index') }}"  class="btn btn-success mt-2">
                    Regresar
                </a>
            </form>
        </div>
    </div>


@endsection
