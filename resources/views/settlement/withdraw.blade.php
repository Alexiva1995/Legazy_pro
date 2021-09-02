@extends('layouts.dashboard')

@push('vendor_css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
<style>
    .bg-gris{
        background: #5f5f5f5f;
    }
</style>
@endpush

@push('page_vendor_js')
<script src="{{asset('assets/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/extensions/polyfill.min.js')}}"></script>
@endpush

@section('content')
<div>
    <div class="col-12">
        <div class="card bg-lp">
            <div class="card-header">
                <h4 class="card-title text-white">Retiros</h4>
            </div>
            <div class="card-content">
                <div class="card-body card-dashboard">
                    <form action="">
                        <div class="row">
                            <div class="col-12 mb-1">
                                <h5 class="text-white">Moneda: <b> USDT THETER</b> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Tether_Logo.svg/1280px-Tether_Logo.svg.png" alt="" height="35"></h5>
                            </div>
                            <div class="col-12 col-md-7 mb-1">
                                <label for="">Billetera</label>
                                <input type="text" name="wallet" class="form-control bg-gris">
                            </div>
                            <div class="col-12 col-md-5 mb-1">
                               <div class="row">
                                <div class="col-12 col-md-6">
                                    <h5 class="text-white">
                                        Disponible:
                                        <b>{{Auth::user()->saldoDisponible()}}</b>
                                    </h5>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 class="text-white">
                                        Retiro Minimo:
                                        <b> 50$ </b>
                                    </h5>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 class="text-white">
                                        Fee: <b>6%</b>
                                        <br>
                                        Total Fee:
                                        <b>{{ number_format(Auth::user()->getFeeWithdraw(), 2) }}</b>
                                    </h5>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 class="text-white">
                                        A Recibir:
                                        <b>{{ number_format(Auth::user()->totalARetirar(),2) }}</b>
                                    </h5>
                                </div>
                               </div>
                            </div>
                            <div class="col-12 text-center">
                                <a href="" class="btn btn-primary">Retirar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- @if (!empty($liquidation))
    @include('settlement.componentes.modalAprobar')
    @endif --}}
</div>
@endsection

{{-- @if (!empty($liquidation))
@push('custom_js')
    <script>
        $(document).ready(function () {
            $('#modalModalAprobar').modal('show')
        })
    </script>        
@endpush
@endif --}}


