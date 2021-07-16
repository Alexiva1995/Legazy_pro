@extends('layouts.dashboard')

@section('title', $type)

@push('custom_css')
{{-- <link rel="stylesheet" href="{{asset('assets/css/tree2.css')}}"> --}}
<link rel="stylesheet" href="{{asset('assets/css/customer/joeldesing.css')}}">
@endpush

@section('content')
<body style="background: #141414;">
    <div class="container">
        <div class="row">
<div class="col-6 text-center">
<div class="row">
<div class="container">
<div class="row">
    <div class="col-md-12">
   <div class=" d-flex white mt-2">
        <button class="btn-tree text-left" style="width: 247px;">Puntos Por la Derecha:</button>
    </div>
</div>
</div>

</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
       <div class=" d-flex white mt-2">
            <button class="btn-tree text-left" style="width: 247px;">Puntos por la Izquierda:</button>
        </div>
    </div>
    </div>
    
    </div>
    

</div>
</div>
<div class="col-md-4 art" style="margin-left: 150px;margin-top: -25px;" id="tarjeta">
    <div class="container">
        <div class="row">
        <div class="col-4">
        <img id="imagen" class="rounded-circle" style="width: 118%;margin-top: 7px;padding-top: 15px;">
      </div>
      <div class="col-6 ml-1">
      <div class="white mt-1">
      <p>Nombre: <span id="nombre"></span></p>
    </div>
    <div class="white">
      <p>Estado: <span  id="estado"></span></p>
    </div>
    <div class="white">
      <p>Inversión: <span id="inversion"></span></p>
    </div>
</div>
</div>
</div>

    <div class="d-flex white mb-2" style="margin-left: 66px;margin-right: 63px;">
        <button class="btn-tree text-center" style="width: 175px;background: #1b1b1b;margin-left: 72px;" id="ver_arbol">Ver Arbol</button>
    </div>

</div>
</div>
</div>


    <div class="padre">
        <ul>
            <li class="baseli">
                <a class="base" href="#">
                    <img src="{{asset('storage/photo/'.Auth::user()->photoDB)}}" alt="{{$base->name}}" title="{{$base->name}}" class="pt-1 rounded-circle" style="width: 95%;height: 107%;margin-left: 0px;margin-top: -8px;">
                </a>
                {{-- Nivel 1 --}}
                <ul>
                    @foreach ($trees as $child)
                    <li class="esca" href="#prestamo" data-toggle="modal">
                       
                        @include('genealogy.component.subniveles', ['data' => $child])
                        @if (!empty($child->children))
                        {{-- nivel 2 --}}
                        <ul>
                            @foreach ($child->children as $child)
                            <li>
                                @include('genealogy.component.subniveles', ['data' => $child])
                                @if (!empty($child->children))
                                {{-- nivel 3 --}}
                                <ul>
                                    @foreach ($child->children as $child)
                                    <li>
                                        @include('genealogy.component.subniveles', ['data' => $child])
                                        @if (!empty($child->children))
                                        {{-- nivel 4 --}}
                                        <ul>
                                            @foreach ($child->children as $child)
                                            <li>
                                                @include('genealogy.component.subniveles', ['data' => $child])
                                                @if (!empty($child->children))
                                                {{-- nivel 5 --}}
                                                <ul>
                                                    @foreach ($child->children as $child)
                                                    <li>
                                                        @include('genealogy.component.subniveles', ['data' => $child])
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                {{-- fin nivel 5 --}}
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                        {{-- fin nivel 4 --}}
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                                {{-- fin nivel 3 --}}
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        {{-- fin nivel 2 --}}
                        @endif
                    </li>
                    @endforeach
                </ul>
                {{-- fin nivel 1 --}}
            </li>
        </ul>
    </div>
    @if (Auth::id() != $base->id)
    <div class="col-12 text-center">
        <a class="btn btn-info" href="{{route('genealogy_type', strtolower($type))}}">Regresar a mi arbol</a>
    </div>
    @endif
</div>
<script type="text/javascript">
    
    function tarjeta(data, url,base){
        //console.log('assets/img/sistema/favicon.png');
        if(data.fullname == " "){
        $('#nombre').text(base.name)
        }else{
        $('#nombre').text(data.fullname);
        }
        if(data.photoDB == null){
            $('#imagen').attr('src', "{{ asset('/assets/img/sistema/favicon.png') }}" );   
        }else{
            $('#imagen').attr('src', '/storage/'+data.photoDB);    
        }
        
        $('#ver_arbol').attr('href', url);
        $('#inversion').text(data.inversion);
        if(data.status == 0){
            $('#estado').html('<span class="badge badge-warning">Inactivo</span>');
        }else if(data.status == 1){
            $('#estado').html('<span class="badge badge-success">Activo</span>');
        }else if(data.status == 2){
            $('#estado').html('<span class="badge badge-danger">Eliminado</span>');
        }
        
        $('#tarjeta').removeClass('d-none');
    }
</script>
</body>

@endsection