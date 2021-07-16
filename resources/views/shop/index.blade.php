@extends('layouts.dashboard')

@push('vendor_css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
@endpush

@push('page_vendor_js')
<script src="{{asset('assets/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/extensions/polyfill.min.js')}}"></script>
@endpush


@section('content')
<div id="adminServices" >
    <div class="col-12">
        <div class="card" style="background: #1b1b1b;">
            <div class="card-content">
                <div class="card-body card-dashboard">
                    <div class="row">
                        @foreach ($packages as $items)
                            <div class="col col-md-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="card-header d-flex align-items-center mb-2 ">
                                            <img src="{{asset('assets/img/Recurso31.png')}}" alt="" style="width: 100%; heigh:100%;">
                                        </div>
                                        <div>{{$items->name}}</div>
                                        <form action="{{route('shop.procces')}}" method="POST" target="_blank" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="idproduct" value="{{$items->id}}">
                                        <button class="btn btn-primary" type="submit">Comprar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>  
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection