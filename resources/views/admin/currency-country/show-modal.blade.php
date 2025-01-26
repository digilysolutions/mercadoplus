<div class="modal fade childModal" id="countrycurrencyShowModal{{ $countrycurrency['id'] }}" tabindex="-1" role="dialog"
    aria-labelledby="countrycurrencyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="countrycurrencyModalLabel">Detalles Tasa de Cambio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">

                            <div class="row">
                                <div class="col-md-9">
                                    <h5 class="mb-1" id="currency">
                                        {{ $countrycurrency['currency']['currency'] }}</h5>
                                    <p>{{ $countrycurrency['country']['name'] }}</p>
                                </div>
                                <div class="col-md-3">                                   
                                    <strong>{{ $countrycurrency['currency']['code'] }}</strong>
                                </div>
                                <div class="col-md-12"> 
                                    <p class="mb-1">Tasa de cambio:
                                        <strong>{{ $countrycurrency['currency']['symbol'] }}{{ $countrycurrency['exchange_rate'] }} {{ $countrycurrency['code_currency_default'] }}</strong>
                                    </p>
                                   
                                </div>

                                <div class="col-md-12">
                                    <p class="mb-1">Activado:
                                        @if ($countrycurrency['is_activated'])
                                            Si
                                        @else
                                            No
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeChildModal()">Cerrar</button>
            </div>
        </div>
    </div>
</div>
