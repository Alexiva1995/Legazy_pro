@push('script')
<script>
var progreso = 0;
var idIterval = setInterval(function(){
  // Aumento en 10 el progeso
  progreso +=10;
  $('#bar').css('width', progreso + '%');
     
  //Si llegó a 100 elimino el interval
  if(progreso == 100){
    clearInterval(idIterval);
  }
},1000);
<script>
@endpush
<body style="background:#141414">
<div class="row mt-1">

{{--carosel---}}
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel"style="width: 100%;">
  <div class="carousel-inner">
    <div class="carousel-item active">
        
      <img class="col-3 w-5" src="{{asset('assets/img/btc.png')}}" alt="First slide">
      <img class="w-5 col-3" src="{{asset('assets/img/etc.png')}}" alt="First slide">
      <img class="w-5 col-3" src="{{asset('assets/img/Vector.png')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


    
     {{-- Seccion Grafico --}}

     {{-- dos primeras tarjetas --}}
    <div class="col-12">
        <div class="row">
            <div class="col-sm-6 col-12 mt-1">
                <div class="card h-100" style="background: #cb9b32;">
                    <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                         <p class="mt-1 mb-0">Saldo disponible</p>
                    </div>
                    
                        <div class="card-sub d-flex align-items-center">
                            <h2 class="text-bold-700 mb-0 white">$78.20 </h2>
                        </div>
                    <div class=" card-header d-flex align-items-center mt-3">
                        <button class="btn btn-dark">RETIRAR</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12 mt-1">
                <div class="card h-100" style="background: #1b1b1b;">
                    <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                         <p class="mt-1 mb-0">Ganacia Actual</p>
                    </div>
                    
                        <div class="card-sub d-flex align-items-center ">
                            <h2 class="gold text-bold-700 mb-0">$215.89 </h2>
                        </div>
                        
                        <div class="d-flex align-items-center">
                        <div class="progress ml-2 mt-5" style="height: 25px;width: 80%;">
                            <div id="bar" class="progress-bar active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                              <span class="sr-only">0% Complete</span>
                            </div>
                          </div>
                          <div class="card-sub d-flex align-items-center ">
                            <p class="white text-bold-700 mb-0">215.89% </p>
                        </div>
                          </div>
                       
                    
                </div>
            </div>
            {{--                                --}}

            <div class="col-sm-6 col-md-5 col-12 mt-1">
                <div class="card h-90" style="background: #1b1b1b;">
                    <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                         <p class="mt-1 mb-0">Link de referido</p>
                    </div>
                    
                        <div class="card-sub d-flex align-items-center ">
                            <h2 class="gold text-bold-700 mb-0">INVITA A <br> PERSONAS</br> </h2>
                        </div>
                    <div class=" card-header d-flex align-items-center white mt-2">
                        <button class="btn-darks" style="boder-color=#D6A83E">LINK DE REFERIDO</button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-12 mt-1">
                <div class="card h-90" style="background: #1b1b1b;">
                    <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                         <p class="mt-1 mb-0">Lado Binario</p>
                    </div>
                    
                        <div class="card-sub d-flex align-items-center ">
                            <h2 class="gold text-bold-700 mb-0">IZQUIERDO </h2>
                        </div>
                    <div class=" card-dl d-flex align-items-center mt-5">
                        <input type="checkbox" name="vehicle1" value="Bike">IZQUIERDO</input>
                        <input type="checkbox" name="vehicle1" value="Bike">DERECHO</input>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-12 mt-1">
                <div class="card h-90" style="background: #1b1b1b;">
                    <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                         <p class="mt-1 mb-0">Paquete de inversion</p>
                    </div>
                    
                    <div class="card-header d-flex align-items-center mb-2 ">
                            <img src="{{asset('assets/img/Recurso31.png')}}" alt="" style="width: 90%; heigh:100%;margin-top: -15px;">
                        </div>

                </div>
            </div>


            {{----}}

            
            <div class="col-sm-6 col-12 mt-1">
                <div class="card h-100" style="background: #1b1b1b;">
                    <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                         <p class="mt-1 mb-0 white">Total de ventas</p>
                    </div>
                    
                        <div class="card-header d-flex align-items-center ">
                            <h2 class="text-bold-700 mb-0">grafico </h2>
                        </div>
                    
                </div>
            </div>

            <div class="col-sm-6 col-12 mt-1">
                <div class="card h-100" style="background: #1b1b1b;">
                    <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                         <p class="mt-1 mb-0">Proximo rango</p>
                    </div>
                    
                        <div class="card-header d-flex align-items-center mb-2 ">
                            <img src="{{asset('assets/img/Group86.png')}}" alt="" style="width: 100%;" height="200">
                        </div>

                        <div class="card-header d-flex align-items-center mb-2 ">
                            <img src="{{asset('assets/img/Line28.png')}}" alt="" style="width: 100%;" height="1">
                        </div>
                        
                        <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                         <p class="mt-1 mb-0">total de puntos:</p>
                        </div>

                        <div class="card-sub d-flex align-items-center ">
                            <h2 class="gold text-bold-700 mb-0">3,960</h2>
                        </div>
                        
                        <div class="d-flex align-items-center">
                        <div class="progress ml-2" style="height: 25px;width: 80%;">
                            <div id="bar" class="progress-bar active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                              <span class="sr-only">0% Complete</span>
                            </div>
                          </div>
                          <div class="card-sub d-flex align-items-center ">
                            <p class="white text-bold-700" style="margin-top: -30px;">87% </p>
                        </div>
                          </div>
                          <div class="card-sub">
                            <p class="white text-bold-700"style="margin-top: -50px;">proximo rango = 5,000 </p>
                        </div>
                </div>
            </div>

            {{----}}

            <div class="col-12 mt-1 mb-3">
                <div class="card h-100" style="background: #1b1b1b;">
                    <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                         <p class="mt-1 mb-0">Precio de las acciones</p>
                    </div>
                    
                        <div class="card-header d-flex align-items-center ">
                            <h2 class="text-bold-700 mb-0">$7,104.32</h2>
                        </div>

                        <div class="card-header d-flex align-items-center ">
                            <h2 class="text-bold-700 mb-0">grafico</h2>
                        </div>
                    
                </div>
            </div>
</div>
</body>