@extends('layouts.dashboard')

<script>
    
</script>
@section('content')

<section>
    <div class="row match-height d-flex justify-content-center">
        <div class="col-md-6 col-12">
<<<<<<< HEAD



               <div class="card bg-lp">
                 <div class="card bg-lp">
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
                                        <textarea type="text"  id="asunto"
                                            class="form-control bg-lp border border-warning rounded-0"
                                            name="asunto">{{ $ticket->issue }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="status" class="text-white">Estado del Ticket</label>
                                            <span class="text-danger text-bold-600">OBLIGATORIO</span>
                                            <select name="status" id="status"
                                                class="custom-select status form-control bg-lp border border-warning rounded-0 @error('status') is-invalid @enderror"
                                                required data-toggle="select">
                                                <option value="0" @if($ticket->status == '0') selected
                                                    @endif>Abierto</option>
                                                <option value="1" @if($ticket->status == '1') selected
                                                    @endif>Cerrado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="priority" class="text-white">Prioridad del
                                                Ticket</label>
                                            <span class="text-danger text-bold-600">OBLIGATORIO</span>
                                            <select name="priority" id="priority"
                                                class="custom-select priority form-control bg-lp border border-warning rounded-0 @error('priority') is-invalid @enderror"
                                                required data-toggle="select">
                                                <option value="0" @if($ticket->priority == '0') selected
                                                    @endif>Alto</option>
                                                <option value="1" @if($ticket->priority == '1') selected
                                                    @endif>Medio</option>
                                                <option value="2" @if($ticket->priority == '2') selected
                                                    @endif>Bajo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-white">Descripcion del Ticket</label>
                                        <textarea type="text" rows="5" id="description"
                                            class="form-control form-control bg-lp border border-warning rounded-0"
                                            name="description">{{ $ticket->description }}</textarea>
=======
            <div class="card bg-lp">
                    <div class="card-header">
                        <h4 class="card-title text-white">Editando el Ticket #{{ $ticket->id}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{route('ticket.update-user', $ticket->id)}}" method="POST">
                                @csrf
                                @method('PATCH')

                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label text-white mb-1" for="issue"><b>Asunto del
                                                    ticket</b></label>
                                            <input class="form-control border border-warning rounded-0" type="text"
                                                id="issue" name="issue" value="{{ $ticket->issue }}" rows="3" />

                                        </div>

                                        <div class="col-12 mt-2">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="priority" class="text-white">Prioridad del
                                                        Ticket</label>
                                                    <span class="text-danger text-bold-600">OBLIGATORIO</span>
                                                    <select name="priority" id="priority"
                                                        class="custom-select priority form-control bg-lp border border-warning rounded-0 @error('priority') is-invalid @enderror"
                                                        required data-toggle="select">
                                                        <option value="0" @if($ticket->priority == '0') selected
                                                            @endif>Alto</option>
                                                        <option value="1" @if($ticket->priority == '1') selected
                                                            @endif>Medio</option>
                                                        <option value="2" @if($ticket->priority == '2') selected
                                                            @endif>Bajo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-2 mb-2">
                                            <label class="form-label text-white mb-1" for="message"><b>Chat con el
                                                    administrador</b></label>

                                            <section class="chat-app-window mb-2 border border-warning rounded-0">
                                                <div class="active-chat">
                                                    <div class="user-chats ps ps--active-y bg-lp">
                                                        <div class="chats chat-thread">

                                                            {{-- admin --}}
                                                            <div class="chat chat-left">
                                                                <div class="chat-avatar">
                                                                    <span class="avatar box-shadow-1 cursor-pointer">
                                                                        <img src="{{ asset('assets/img/legazy_pro/logo.svg') }}"
                                                                            alt="avatar" height="36" width="36">
                                                                    </span>
                                                                </div>
                                                                <div class="chat-body">
                                                                    <div class="chat-content">
                                                                        <p>Hola!. ¿Cómo podemos ayudar? 😄</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @foreach ( $message as $item )

                                                            {{-- user --}}
                                                            @if ($item->type == 0)
                                                            <div class="chat">
                                                                <div class="chat-avatar">
                                                                    <span class="avatar box-shadow-1 cursor-pointer">
                                                                        @if (Auth::user()->photoDB != NULL)
                                                                        <img src="{{asset('storage/photo/'.Auth::user()->photoDB)}}"
                                                                            alt="avatar" height="36" width="36">
                                                                        @else
                                                                        <img src="{{ asset('assets/img/legazy_pro/logo.svg') }}"
                                                                        alt="avatar" height="36" width="36">
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                                <div class="chat-body">
                                                                    <div class="chat-content">
                                                                        <p>{{ $item->message }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- admin --}}
                                                            @elseif ($item->type == 1)
                                                            <div class="chat chat-left">
                                                                <div class="chat-avatar">
                                                                    <span class="avatar box-shadow-1 cursor-pointer">
                                                                        <img src="{{ asset('assets/img/legazy_pro/logo.svg') }}"
                                                                        alt="avatar" height="36" width="36">
                                                                    </span>
                                                                </div>
                                                                <div class="chat-body">
                                                                    <div class="chat-content">
                                                                        <p>{{ $item->message }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                            
                                                            @endforeach


                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

                                            <span class="text-danger text-bold-600">Aqui podra escribir el mensaje para el admin</span>
                                            <textarea
                                                class="form-control border border-warning rounded-0"
                                                type="text" id="message" name="message" required rows="3"></textarea>
                                        </div>

>>>>>>> 1909c18e93db4ff852e75d9547ce15e6798d7230
                                    </div>
                                </div>

<<<<<<< HEAD

                                <div class="col-12 mt-2 mb-2">
                                    <label class="form-label text-white" for="note"><b>Chat con el administrador</b></label>

                                    {{-- <ul class="chat-thread p-2 border border-warning rounded-0">
                                        @foreach ($message as $item)
                                        <li>{{ $item->id }}</li>
                                        <li>{{ $item->id }}</li>
                                        <li>{{ $item->id }}</li>
                                        <li>{{ $item->id }}</li>
                                        <li>{{ $item->getUser->fullname }}</li>
                                        <li>{{ $item->message }}</li>
                                        @endforeach
                                    </ul> --}}

                                        <section class="chat-app-window mb-2 border border-warning rounded-0">
                                            <div class="active-chat">
                                                <div class="user-chats ps ps--active-y bg-lp">
                                                    <div class="chats">

                                                        {{-- admin --}}
                                                        <div class="chat">
                                                            <div class="chat-avatar">
                                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                                    <img src="{{ asset('assets/img/legazy_pro/logo.svg') }}"
                                                                        alt="avatar" height="36" width="36">
                                                                </span>
                                                            </div>
                                                            <div class="chat-body">
                                                                <div class="chat-content">
                                                                    <p>How can we help? We're here for you! 😄</p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        {{-- user --}}
                                                        <div class="chat chat-left">
                                                            <div class="chat-avatar">
                                                                <span class="avatar box-shadow-1 cursor-pointer">
                                                                    <img src="{{ asset('assets/img/legazy_pro/user.png') }}"
                                                                        alt="avatar" height="36" width="36">
                                                                </span>
                                                            </div>
                                                            <div class="chat-body">
                                                                <div class="chat-content">
                                                                    <p>Hey John, I am looking for the best admin
                                                                        template.</p>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <label for="note">Escribir mensaje</label>
                                        <span class="text-danger text-bold-600">(Espere que el admin responda antes de enviar
                                            otro mensaje)</span>
                                        <textarea class="form-control border border-warning rounded-0 chat-window-message"
                                            type="text" id="note" name="note"></textarea>
                                </div>

                            

                            </div>


                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Actualizar Ticket</button>
                                    </div>
                                </div>
                            </div>
=======
                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Actualizar
                                        Ticket</button>
>>>>>>> 1909c18e93db4ff852e75d9547ce15e6798d7230
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
