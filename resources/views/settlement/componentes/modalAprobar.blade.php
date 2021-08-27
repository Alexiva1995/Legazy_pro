<!-- Modal -->
<div class="modal fade" id="modalModalAprobar" tabindex="-1" role="dialog" aria-labelledby="modalModalAprobarTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="modalModalAprobarTitle">Aprobar Retiro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">
                <div class="alert alert-primary" role="alert">
                    Intentos Fallidos {{session('intentos_fallidos')}}/3
                  </div>
                <form action="{{route('settlement.process')}}" method="post">
                    @csrf
                    <input type="hidden" name="idliquidation" value="{{$liquidation->id}}">
                    <input type="hidden" name="action" value="aproved">
                    <h5 class="text-white">Usuario: <strong>{{$liquidation->getUserLiquidation->fullname}}</strong></h5>
                    <h5 class="text-white">Total: <strong>{{$liquidation->total}}</strong></h5> 

                    <div class="form-group" >
                        <label for="">Codigo Google</label>
                        <input type="text" name="google_code" class="form-control" required>
                    </div>
                    <div class="form-group" >
                        <label for="">Codigo Correo</label>
                        <input type="text" name="correo_code" class="form-control" required>
                    </div>
                    <div class="form-group" >
                        <label for="">Billetera</label>
                        <input type="text" name="wallet" class="form-control" required>
                    </div>
                    
                    <div class="form-group text-center">
                        <button class="btn btn-primary">Aprobar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>