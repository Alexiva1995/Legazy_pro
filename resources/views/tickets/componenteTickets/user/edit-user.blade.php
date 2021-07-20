<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</head>
<body>


@extends('layouts.dashboard')

@section('content')

<section id="basic-vertical-layouts">
    <div class="row match-height d-flex justify-content-center">
        <div class="col-md-6 col-12">
            <div class="card bg-dark" >
                <div class="card-header">
                    <h4 class="card-title text-white">Editando el Ticket #{{ $ticket->id}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body" >
                        <form action="{{route('ticket.update-user', $ticket->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <div class="row">
                              
                                   <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-white">Asunto del Ticket</label>
                                            <input type="text" id="issue" class="form-control" name="issue" style="background:#141414; color: #ffffff; border: #141414;"  value="{{ $ticket->issue }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="priority" class="text-white">Prioridad del Tcket</label>
                                                <span class="text-danger text-bold-600">OBLIGATORIO</span>
                                                <select name="priority" style="background:#141414; color: #ffffff; border: #141414;" 
                                                    id="priority"
                                                    class="custom-select priority @error('priority') is-invalid @enderror"
                                                    required data-toggle="select">
                                                    <option value="0" @if($ticket->priority == '0') selected  @endif>Alto</option>
                                                    <option value="1" @if($ticket->priority == '1') selected  @endif>Medio</option>
                                                    <option value="2" @if($ticket->priority == '2') selected  @endif>Bajo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-white">Descripcion del Ticket</label>
                                            <textarea type="text" rows="5" id="description" class="form-control"
                                                name="description"style=" background:#141414; color: #ffffff; border: #141414;">{{ $ticket->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Actualizar Ticket</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

</body>
</html>
