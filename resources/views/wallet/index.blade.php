@extends('layouts.dashboard')

{{-- contenido --}}
@section('content')
<div class="col-12">
    <div class="card" style="background-color: #1E1E1E">
   
        <div class="card-content">
            <div class="card-body card-dashboard">
                <div class="float-right row no-gutters" style="width: 30%;">
                    <div class="col-6">
                        <span class="font-weight-bold text-white">Saldo disponible:</span> 
                    </div>
                    <div class="col-6">
                        $ {{number_format($saldoDisponible,2)}}
                    </div>
                    
                </div>
                <div class="table-responsive"> 
                    @include('wallet.component.tableWallet')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- permite llamar a las opciones de las tablas --}}
@include('layouts.componenteDashboard.optionDatatable')
