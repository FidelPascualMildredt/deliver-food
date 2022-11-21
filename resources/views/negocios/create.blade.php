@extends('layouts.dashboard.app')
@section('container')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Crear nuevo Negocio
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('negocio.store') }}" method="POST">
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
                <label>Direccion</label>
                <input type="text" name="direccion" class="form-control" placeholder="Ingresa la direccion" value="{{old('direccion')}}">
                @error('direccion')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control" placeholder="Ingresa el correo" value="{{old('correo')}}">
                @error('correo')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Telefono</label>
                <input type="Tel" name="telefono" class="form-control" placeholder="Ingresa el telefono" value="{{old('telefono')}}">
                @error('telefono')
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

            {{--  <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Horario del establecimiento
                      </button>
                    </h2>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label class="col-form-label mt-4">Lunes: </label>
                              </div>
                            <div class="col-sm-5">
                              <label>Hora inicio</label> <input type="time" name="inico_lunes" value="09:00" class="form-control">
                            </div>
                            <div class="col-sm-5">
                              <label>Hora final</label> <input type="time" name="fin_lunes" value="18:00" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label class="col-form-label">Martes: </label>
                              </div>
                            <div class="col-sm-5">
                              <input type="time" name="inico_martes" value="09:00" class="form-control">
                            </div>
                            <div class="col-sm-5">
                              <input type="time" name="fin_martes" value="18:00" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label class="col-form-label">Miercoles: </label>
                              </div>
                            <div class="col-sm-5">
                              <input type="time" name="inico_miercoles" value="09:00" class="form-control">
                            </div>
                            <div class="col-sm-5">
                              <input type="time" name="fin_miercoles" value="18:00" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label class="col-form-label">Jueves: </label>
                              </div>
                            <div class="col-sm-5">
                              <input type="time" name="inico_jueves" value="09:00" class="form-control">
                            </div>
                            <div class="col-sm-5">
                              <input type="time" name="fin_jueves" value="18:00" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label class="col-form-label">Viernes: </label>
                              </div>
                            <div class="col-sm-5">
                              <input type="time" name="inico_viernes" value="09:00" class="form-control">
                            </div>
                            <div class="col-sm-5">
                              <input type="time" name="fin_viernes" value="18:00" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label class="col-form-label">Sábado: </label>
                              </div>
                            <div class="col-sm-5">
                              <input type="time" name="inico_sabado" value="09:00" class="form-control">
                            </div>
                            <div class="col-sm-5">
                              <input type="time" name="fin_sabado" value="18:00" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label class="col-form-label">Domingo: </label>
                              </div>
                            <div class="col-sm-5">
                              <input type="time" name="inicio_domingo" value="00:00" class="form-control">
                            </div>
                            <div class="col-sm-5">
                              <input type="time" name="fin_domingo" value="00:00" class="form-control">
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>  --}}

            <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            <a href="{{ route('negocio.index') }}"  class="btn btn-success mt-2">
                Regresar
            </a>
        </form>
    </div>
</div>




@endsection
