@extends('layouts.dashboard')

@section('title', $type)

@push('custom_css')
<link rel="stylesheet" href="{{asset('assets/css/tree2.css')}}">
@endpush

@section('content')

<div class="padre">
    <div class="card d-none shadow-lg" style="margin-bottom: 0px;" id="tarjeta">
        <div class="card-body p-1">
            <div class="row no-gutters">
                <div class="col-4">
                    <img class="float-left rounded-circle shadow-lg" id="imagen" width="96" height="96">
                </div>
                <div class="col-8">
                    <div class="ml-1"><span class="font-weight-bold">Nombre:</span> <span id="nombre"></span></div>

                    <div class="ml-1"><span class="font-weight-bold">Inversion:</span> <span id="inversion"></span>
                    </div>

                    <div class="ml-1 mb-1"><span class="font-weight-bold">Estado:</span> <span id="estado"></span></div>

                    <div class="ml-1"><a id="ver_arbol" class="btn btn-primary btn-sm btn-block" href=>Ver arbol</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @if (Auth::user()->admin == 1)
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-10">
                        <label class="control-label " style="text-align: center; margin-top:4px;">ID Usuario</label>
                        <input class="form-control form-control-solid placeholder-no-fix" type="number"
                            autocomplete="off" name="iduser" id="iduser" required style="background-color:f7f7f7;" />
                    </div>
                    <div class="col-12 text-center col-md-2" style="padding-left: 10px;">
                        <button class="btn btn-primary mt-2" type="submit" onclick="buscar('tree')">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    <div class="container">
        <span class="text-dark rounded border-primary p-1 float-left">Puntos Izquierdos:
            <strong>{{$base->puntosizq}}</strong></span>
        <span class="text-dark rounded border-primary p-1 float-right">Puntos Derechos:
            <strong>{{$base->puntosder}}</strong></span>
    </div>

    <ul>
        <li class="baseli px-0" style="width:100%;">
            <a class="base" href="#">
                <img src="{{$base->logoarbol}}" alt="{{$base->name}}" title="{{$base->name}}" height="82" class="pt-1">
            </a>
            {{-- Nivel 1 --}}
            <ul>
                @foreach ($trees as $child)
                <li>
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

<script type="text/javascript">

    function tarjeta(data, url) {
        //console.log('assets/img/sistema/favicon.png');
        $('#nombre').text(data.fullname);
        if (data.photoDB == null) {
            $('#imagen').attr('src', "{{ asset('/assets/img/sistema/favicon.png') }}");
        } else {
            $('#imagen').attr('src', '/storage/' + data.photoDB);
        }

        $('#ver_arbol').attr('href', url);
        $('#inversion').text(data.inversion);
        if (data.status == 0) {
            $('#estado').html('<span class="badge badge-warning">Inactivo</span>');
        } else if (data.status == 1) {
            $('#estado').html('<span class="badge badge-success">Activo</span>');
        } else if (data.status == 2) {
            $('#estado').html('<span class="badge badge-danger">Eliminado</span>');
        }

        $('#tarjeta').removeClass('d-none');
    }


	function nuevoreferido(id, type) {
		let ruta = "{{url('dashboard/genealogy')}}/" + type + '/' + id
		window.location.href = ruta
	}

	function buscar(type) {
		let iduser = $('#iduser').val()
		if (iduser != '') {
			nuevoreferido(btoa(iduser), type)
		}else{
			alert('Rellene el campo de id de usuario')
		}
	}


</script>
@endsection
