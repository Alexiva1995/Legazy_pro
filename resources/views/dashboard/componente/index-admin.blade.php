    <div class="row mt-1">
        <div class="col-12">

        @include('dashboard.componente.partials.tranding-view')

            <div class="row" id="dashboard-analytics">
                <div class="col-sm-6 col-12 mt-1">
                    <div class="card h-80 p-2"
                        style="background: linear-gradient(90deg, rgba(172,118,19,1) 0%, rgba(214,168,62,1) 94%);">

                        <div class="float-right d-flex">
                            <img class="float-right" src="{{ asset('assets/img/icon/money.svg') }}" alt="">
                        </div>

                        <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                            <h2 class="mt-1 mb-0 text-white"><b>Saldo disponible</b></h2>
                        </div>
                        <div class="card-sub d-flex align-items-center">
                            <h1 class="text-white mb-0"><b>$78.20</b></h1>
                        </div>

                        <div class="card-header d-flex align-items-center mt-3">
                            <button class="btn btn-dark rounded-0"><b>RETIRAR</b></button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-12 mt-1">
                    <div class="card h-80 p-2" style="background: #1b1b1b;">
                        <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                            <h2 class="mt-1 mb-0 text-white"><b>Ganacia Actual</b></h2>
                        </div>

                        <div class="card-sub d-flex align-items-center ">
                            <h1 class="gold text-bold-700 mb-0"><b>$215.89</b></h1>
                        </div>

                        <div class="d-flex align-items-center">

                            <div class="progress ml-2 mt-5" style="height: 25px;width: 100%;">
                                <div id="bar" class="progress-bar active" role="progressbar" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                </div>
                            </div>

                            <div class="card-sub d-flex align-items-center ">
                                <p class="text-bold-700 mb-0 text-white">215.89% </p>
                            </div>

                        </div>

                        <div class="card-sub align-items-center mt-0 ">
                            <h6 class="text-bold-700 mb-0 text-white"><b>Activo 2021-07-04</b></h6>
                        </div>

                    </div>
                </div>



                <div class="col-sm-6 col-md-5 col-12 mt-1">
                    <div class="card h-90 p-2" style="background: #1b1b1b;">
                        <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                            <h5 class="mt-1 mb-0 text-white"><b>Link de referido</b></h5>
                        </div>

                        <div class="card-sub d-flex align-items-center ">
                            <h2 class="gold text-bold-700 mb-0">INVITA A<br>PERSONAS<br></h2>
                        </div>
                        <div class=" card-header d-flex align-items-center white mt-2">
                            <button class="btn-darks" style="boder-color=#D6A83E" onclick="getlink()"><b>LINK DE REFERIDO <i class="fa fa-copy"></i></b></button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-12 mt-1">
                    <div class="card h-90 p-2" style="background: #1b1b1b;">
                        <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                            <h5 class="mt-1 mb-0 text-white"><b>Lado Binario</b></h5>
                        </div>

                        <div class="card-sub d-flex align-items-center ">
                            <h1 class="gold text-bold-700 mb-0">
                                @if (Auth::user()->binary_side_register == 'I')
                                Izquierda
                                @else
                                Derecha
                                @endif
                            </h1>
                        </div>
                        <div class="card-dl d-flex align-items-center mt-5">

                            @if (Auth::user()->binary_side_register == 'I')
                            <a href="#" class="btn btn-primary padding-button-short bg-white mt-1 waves-effect waves-light text-white" v-on:click="updateBinarySide('D')">
                                Derecha
                            </a>

                            <a href="#" class="btn btn-outline-warning padding-button-short bg-white mt-1 waves-effect waves-light text-white" v-on:click="updateBinarySide('I')">
                                Izquierda
                            </a>
                            @else
                            <a href="#" class="btn btn-primary padding-button-short bg-white mt-1 waves-effect waves-light text-white" v-on:click="updateBinarySide('D')">
                                Derecha
                            </a>

                            <a href="#" class="btn btn-primary padding-button-short bg-white mt-1 waves-effect waves-light text-white" v-on:click="updateBinarySide('I')">
                                Izquierda
                            </a>
                            @endif


                        </div>
                    </div>
                </div>

                
                <div class="col-sm-6 col-md-3 col-12 mt-1">
                    <div class="card h-90 p-2" style="background: #1b1b1b;">
                        <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                            <h5 class="mt-1 mb-0 text-white"><b>Paquete de inversión</b></h5>
                        </div>

                        <div class="card-header d-flex align-items-center mb-2 ">
                            <img src="{{asset('assets/img/Recurso31.png')}}" alt=""
                                style="width: 90%; heigh:100%;margin-top: -15px;">
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-12 mt-1">
                    <div class="card h-100 p-2" style="background: #1b1b1b;">
                        <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                            <h5 class="mt-1 mb-0 text-white"><b>Total de ventas</b></h5>
                        </div>
                            @include('dashboard.componente.partials.grafig-1')
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
                                <div id="bar" class="progress-bar active" role="progressbar" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                    <span class="sr-only">0% Complete</span>
                                </div>
                            </div>
                            <div class="card-sub d-flex align-items-center ">
                                <p class="white text-bold-700" style="margin-top: -30px;">87% </p>
                            </div>
                        </div>
                        <div class="card-sub">
                            <p class="white text-bold-700" style="margin-top: -50px;">proximo rango = 5,000 </p>
                        </div>
                    </div>
                </div>

                {{----}}

                <div class="col-12 mt-1 mb-3">
                    <div class="card h-100 p-2" style="background: #1b1b1b;">
                        <div class="card-header d-flex align-items-center text-right pb-0 pt-0 white">
                            <h5 class="mt-1 mb-0 text-white mb-2"><b>Precio de las acciones</b></h5>
                        </div>

                        @include('dashboard.componente.partials.tranding-view-btc')

                    </div>
                </div>
            </div>
        </div>
    </div>


 