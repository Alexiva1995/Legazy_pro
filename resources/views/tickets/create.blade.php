<!DOCTYPE html>
<html>
<head>


 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  

    <!-- CSS only -->

</head>
<body>



@extends('layouts.dashboard')

@section('content')


<section id="basic-vertical-layouts">

    <div class="row match-height d-flex justify-content-center">
        <div class="col-md-6 col-12" >
            <div class="card bg-dark" >
                <div class="card-header">
                    <h4 class="card-title text-white">Creacion de Ticket</h4>
                </div>
                <div class="card-content">
                    <div class="card-body" >
                        <form action="{{route('ticket.store')}}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                              
                                  <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-white">Asunto del Ticket</label>
                                            <input type="text" id="issue" class="form-control" style="background:#141414; color: #ffffff; border: #141414;" name="issue">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="priority" class="text-white">Prioridad del Ticket</label>
                                                <span class="text-danger text-bold-600">OBLIGATORIO</span>
                                                <select name="priority" id="priority"
                                                    class="custom-select priority @error('priority') is-invalid @enderror"
                                                    required data-toggle="select" style=" background:#141414; color: #ffffff; border: #141414;">
                                                    <option value="0">Alto</option>
                                                    <option value="1">Medio</option>
                                                    <option value="2">Bajo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                    
                                     <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-white">Descripcion del Ticket</label>
                                            <textarea type="text" rows="5" id="description" class="form-control"
                                                name="description"style=" background:#141414; color: #ffffff; border: #141414;" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Crear
                                            Ticket</button>
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