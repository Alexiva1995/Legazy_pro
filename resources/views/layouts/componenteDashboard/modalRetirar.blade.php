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
        <form method="POST">
            @csrf 
     
            <div class="modal-body text-center">
                
                <div>
                    Monto: $ {{Auth::user()->saldoDisponible()}}
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
    </div>
</div>
