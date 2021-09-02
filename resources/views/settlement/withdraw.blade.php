@extends('layouts.dashboard')

@push('vendor_css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
<style>
    .bg-gris{
        background: #5f5f5f5f;
    }
    a.btn.btn-primary.d.waves-effect.waves-light {
    margin-top: 15px;
    padding: 12px;
    font-size: 22px;
}
    h2.card-title.text-white {
    font-size: 24px !important;
    line-height: 34px;
    font-weight: 600;
}
p.text-white5 {
    font-size: 40px;
    padding: 5px;
}
.form-control {
    background: #141414 !important;
}
h5.text-white {
    font-size: 14px;
    line-height: 20px;
}
input#to::placeholder {
    font-size: 12px;
    background: #141414;
    border: 0px;
}
p.text-white1 {
    margin-left: 5px;
    font-size: 14px !important;
    font-weight: 600;
}
p.text-white1 span {
    font-weight: 400;
    font-size: 12px !important;
    padding-left: 5px;
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
<<<<<<< HEAD
<div>
    <div class=" col-8 offset-md-2">
=======
<div id="withdraw">
    <div class="col-12">
>>>>>>> 673f7e8f8bd372abe8dbe83e4bfee154ffd7ad6d
        <div class="card bg-lp">
            <div class="card-header">
                <h2 class="card-title text-white">Retirar Ganancias</h2>
            </div>
            <div class="card-content">
                <div class="card-body card-dashboard">
<<<<<<< HEAD
                    <form action="">
                        <div class="row">
                            <div class="col-12 mb-1">
                                <h5 class="text-white">Moneda</h5>
                                <p class="text-white1"> <img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/1024/Tether-USDT-icon.png" alt="" height="24"> USDT <span >TetherUS</span></p>
                            </div>
                            <div class="col-12 col-md-12 mb-1">
                                <h5 class="text-white">Dirección</h5>
                                <input type="text" id="to" placeholder="Introduce aquí la dirección" name="wallet" class="form-control bg-gris">
                            </div>
                            <div class="col-12 col-md-12 mb-1">
                                <h5 class="text-white">Red</h5>
                                <p class="text-white1"> TRX <span >Tron (TRC20)</span></p>
                            </div>
                            <div class="col-6 col-md-6 mb-1">
                                <h5 class="text-white">Saldo en USDT</h5>
                                <p class="text-white1"> {{Auth::user()->saldoDisponible()}}</p>
                            </div>
                            <div class="col-6 col-md-6 mb-1">
                                <h5 class="text-white">Retiro Minimo</h5>
                                <p class="text-white1"> 50 USDT</p>
                            </div>
                            <div class="col-6 col-md-6 mb-1">
                                <h5 class="text-white">% de Fee de Retiro</h5>
                                <p class="text-white1"> 6%</p>
                            </div>
                             <div class="col-6 col-md-6 mb-1">
                                <h5 class="text-white">Monto comision</h5>
                                <p class="text-white1">{{ number_format(Auth::user()->getFeeWithdraw(), 2) }}</p>
                            </div>
                            <div class="col-6 col-md-6 mb-1">
                                <h5 class="text-white">Importe que se recibirá</h5>
                                <p class="text-white5">{{ number_format(Auth::user()->totalARetirar(),2) }} USDT</p>
                               
                            </div>
                             <div class="col-6 col-md-6 mb-1">
                                <a href="" class="btn btn-block btn-primary d">Retirar</a>
=======
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
>>>>>>> 673f7e8f8bd372abe8dbe83e4bfee154ffd7ad6d
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