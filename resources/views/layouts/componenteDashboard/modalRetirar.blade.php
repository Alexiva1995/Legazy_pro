<!-- MODAL PARA RETIRAR SALDO DISPONILE -->

<div class="modal fade" id="modalSaldoDisponible" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel">Retiro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: linear-gradient(90deg, rgba(172,118,19,1) 0%, rgba(214,168,62,1) 94%)">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form method="POST" action="{{route('retirarSaldo')}}">
            @csrf 
     
            <div class="modal-body text-center">
               
                <div class="row">
                    <div class="col-12 mb-1">
                        <fieldset class="form-group text-center mb-0" style="font-size: 1.5em;">
                            <label for="" class="font-weight-bold text-white">Monto:</label>
                            <div class="text-center">$ {{Auth::user()->saldoDisponible()}}</div>
                        </fieldset>
                    </div>
                    <div class="col-12 mb-1">
                        <fieldset class="form-group text-center mb-0" style="font-size: 1.5em;">
                            <label for="" class="font-weight-bold text-white">Feed:</label>
                            <div class="text-center">6%</div>
                        </fieldset>
                    </div>
                    <div class="col-12 mb-1">
                        <fieldset class="form-group text-center mb-0" style="font-size: 1.5em;">
                            <label for="" class="font-weight-bold text-white">A recibir:</label>
                            <div class="text-center">$ {{ number_format(floatval(Auth::user()->saldoDisponible()) - floatval(Auth::user()->saldoDisponible()) * 0.06,2) }}</div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
            <button type="submit" class="btn btn-primary">Retirar</button>
            </div>
        </form>
    </div>
    </div>
</div>
