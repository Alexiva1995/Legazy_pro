@extends('layouts.dashboard')

@section('content')
<div id="logs-list">
    <div class="col-12">
        <div class="card" style="background-color: #1E1E1E">
            <div class="card-content">
                <div class="card-body card-dashboard">
                    @if(auth()->user()->admin == 1)
                        <button class="btn btn-primary bg-white mt-1 waves-effect waves-light text-white float-right" data-toggle="modal" data-target="#modalPorcentajeGanancia">Cambiar porcentaje ganancia</button>
                    @endif
                        <table class="table w-100 nowrap scroll-horizontal-vertical myTable table-striped w-100 text-white ">

                            <thead class="">

                                <tr class="text-center text-white bg-purple-alt2">
                                    <th>#</th>
                                    <th>Correo</th>
                                    {{-- <th>Paquete</th> --}}
                                    <th>Inversion</th>
                                    <th>Ganancia</th>
                                    {{-- <th>Capital</th> --}}
                                    <th>% Ganancia</th>
                                    {{-- <th>Ganancia acumulada</th> --}}
                                    {{-- <th>Porcentaje fondo</th> --}}
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($inversiones as $inversion)

                                @php
                                $ganancia = $inversion->capital - $inversion->invertido;

                                $porcentaje = ($ganancia / $inversion->invertido) * 100;
                                @endphp
                                <tr class="text-center text-white">
                                    <td>{{$inversion->id}}</td>
                                    <td>{{$inversion->correo}}</td>
                                    {{-- <td>{{$inversion->getPackageOrden->getGroup->name }} -
                                    {{$inversion->getPackageOrden->name}}</td> --}}
                                    <td>$ {{number_format($inversion->invertido, 2, ',', '.')}}</td>
                                    <td>$ {{number_format($inversion->ganacia, 2, ',', '.')}}</td>
                                    {{-- <td>$ {{number_format($inversion->capital, 2, ',', '.')}}</td> --}}
                                    <td>{{number_format($porcentaje,2, ',', '.')}} %</td>
                                    {{-- <td>$ {{number_format($inversion->ganancia_acumulada,2, ',', '.')}}</td> --}}
                                    {{-- <td>{{number_format($inversion->porcentaje_fondo,2, ',', '.')}} %</td> --}}
                                    <td>{{date('Y-M-d', strtotime($inversion->fecha_vencimiento))}}</td>
                                    <td>
                                        @if($inversion->status == 1)
                                            Activo
                                        @elseif($inversion->status == 2)
                                            Inactivo
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA ACTUALIZAR PORCENTAJE DE GANANCIA -->
@if(auth()->user()->admin == 1)
    <div class="modal fade" id="modalPorcentajeGanancia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Porcentaje de ganancia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('updatePorcentajeGanancia')}}" method="POST">
                @csrf 
                @method('PUT')
                <div class="modal-body">
                    <label for="porcentaje_ganancia">Ingrese el nuevo porcentaje de ganancia</label>
                    <input type="number" name="porcentaje_ganancia" class="form-control" required>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endif

@endsection

{{-- permite llamar a las opciones de las tablas --}}
@include('layouts.componenteDashboard.optionDatatable')
