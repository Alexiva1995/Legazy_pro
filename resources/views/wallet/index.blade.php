@extends('layouts.dashboard')

{{-- contenido --}}
@section('content')
<div class="col-12">
    <div class="card">
        <h1>hola</h1>
        <div class="card-content">
            <div class="card-body card-dashboard">
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
