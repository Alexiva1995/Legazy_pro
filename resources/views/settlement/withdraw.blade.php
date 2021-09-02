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

{{-- permite llamar las librerias montadas --}}
@push('page_js')
<script src="{{asset('assets/js/librerias/vue.js')}}"></script>
<script src="{{asset('assets/js/librerias/axios.min.js')}}"></script>
@endpush

@push('custom_js')
<script src="{{asset('assets/js/withdraw.js')}}"></script>
@endpush

@section('content')
<div id="withdraw">
    <div class="col-12">
        <div class="card bg-lp">
            <div class="card-header">
                <h4 class="card-title text-white">Retiros</h4>
            </div>
            <div class="card-content">
                <div class="card-body card-dashboard">
                    <div class="row">
                        <div class="col-12 mb-1">
                            <h5 class="text-white">Moneda: <b> USDT THETER</b> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Tether_Logo.svg/1280px-Tether_Logo.svg.png" alt="" height="35"></h5>
                        </div>
                        <div class="col-12 col-md-7 mb-1">
                            <label for="">Billetera</label>
                            <input type="text" v-model='wallet' class="form-control bg-gris">
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
                            <button class="btn btn-primary" v-show='wallet != ""' v-on:click='openModalDetails'>Retirar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('settlement.componentes.modalAprobar')
    @include('settlement.componentes.modalInfo')
</div>
@endsection