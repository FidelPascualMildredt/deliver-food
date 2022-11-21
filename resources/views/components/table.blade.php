@php
   $titulo = $titulo ?? 'Definir Cabezera';
@endphp

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            {{$titulo}}
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="col-sm-12">
                    <table class="table table-bordered dataTable">
                        <thead>
                            <tr role="row">
                                @if (isset($encabezado))
                                    {{ $encabezado }}
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($cuerpo))
                                {{ $cuerpo }}
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
