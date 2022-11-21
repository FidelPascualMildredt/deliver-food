@extends('layouts.dashboard.app')
@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Crear nuevo horario
            </h6>
        </div>
        <div class="card-body">

            <form action="{{ route('horario.store') }}" method="POST">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label>Dia</label>
                    <input type="text" name="dia" class="form-control" placeholder="Ingresa el dia" value="{{old('dia')}}">
                    @error('dia')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Hora de inicio</label>
                    <input type="text" name="hora_inicio" class="form-control" placeholder="Ingresa el dia" value="{{old('dia')}}">
                    @error('hora_inicio')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>



                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
                <a href="{{ route('categoria.index') }}"  class="btn btn-success mt-2">
                    Regresar
                </a>
            </form>
        </div>
    </div>
@endsection
