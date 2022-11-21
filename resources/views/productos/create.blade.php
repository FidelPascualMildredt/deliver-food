@extends('layouts.dashboard.app')
@section('container')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Crear nuevo Producto
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('productos.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingresa el nombre" value="{{old('nombre')}}">
                @error('nombre')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Precio</label>
                <input type="number" step="any" name="precio" class="form-control" placeholder="Ingresa el precio" value="{{old('precio')}}">
                @error('precio')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Ingresa el descripcion" value="{{old('descripcion')}}">
                @error('descripcion')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Existencia</label>
                <input type="number" name="stock" class="form-control" placeholder="Ingresa el stock" value="{{old('stock')}}">
                @error('stock')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Categoría</label>
                <select class="form-control form-select" name="categoria">
                    <option value="Elegir" {{old('categoria' ? '' : 'selected')}}>Seleccione una categoría</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}" {{old('categoria') == $categoria->id ? 'selected' : ''}}>{{$categoria->nombre}}</option>
                    @endforeach
                </select>
                @error('categoria')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            {{--  <div class="form-group">
                <label>Imagen</label>
                <input type="text" name="imagen" class="form-control" placeholder="Ingresa el imagen" value="{{old('imagen')}}">
                @error('imagen')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>  --}}


            <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            <a href="{{ route('productos.index') }}"  class="btn btn-success mt-2">
                Regresar
            </a>
        </form>
    </div>
</div>




@endsection
