<<<<<<< HEAD
=======

<!DOCTYPE html>
<html>
<head>
  {{-- <!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}

>>>>>>> william
  @extends('layouts.dashboard')

  @section('content')


  <section id="basic-vertical-layouts">
      <div class="row match-height d-flex justify-content-center">
          <div class="col-md-6 col-12">
              <div class="card bg-lp">
                  <div class="card-header">
                      <h4 class="card-title text-white">Creacion de Ticket</h4>
                  </div>
                  <div class="card-content">
                      <div class="card-body">
                          <form action="{{route('ticket.store')}}" method="POST">
                              @csrf
                              <div class="form-body">
                                  <div class="row">

                                      <div class="col-12">
                                          <label class="form-label text-white mb-1" for="issue"><b>Asunto del
                                                  ticket</b></label>
                                          <input class="form-control border border-warning rounded-0" type="text"
                                              id="issue" name="issue" rows="3"/>

                                      </div>

                                      <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="priority" class="text-white">Prioridad del Ticket</label>
                                                <span class="text-danger text-bold-600">OBLIGATORIO</span>
                                                <select name="priority" style="background:#141414; color: #ffffff; border: #141414;" 
                                                    id="priority"
                                                    class="custom-select priority @error('priority') is-invalid @enderror"
                                                    required data-toggle="select">
                                                    <option value="0">Alto</option>
                                                    <option value="1">Medio</option>
                                                    <option value="2">Bajo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                      <div class="col-12 mt-2 mb-2">
                                        <label class="form-label text-white mb-1" for="note"><b>Mensaje para el administrador</b></label>


                                        <ul class="chat-thread">
                                            <li>Mensaje admin</li>
                                            <li>Mensaje user</li>
                                        </ul> 
                                        <br>
                                        <span class="text-danger text-bold-600">SOLO UN MENSAJE A LA VEZ (Espere que el admin responda antes de enviar otro mensaje)</span>
                                        <textarea class="form-control border border-warning rounded-0 chat-window-message" type="text" id="note" name="note"
                                        rows="3"></textarea>

                                    </div>


                                      <div class="col-12">
                                          <button type="submit"
                                              class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Enviar
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

