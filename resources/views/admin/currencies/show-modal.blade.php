<div class="modal fade" id="currencyShowModal{{ $currency['id'] }}" tabindex="-1" role="dialog"
    aria-labelledby="unitBaseModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Detalles de la
                    Moneda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mb-1" id="name_category">
                                        {{ $currency['currency'] }}</h4>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1">Código:
                                        {{ $currency['code'] }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1">Símbolo:
                                        {{ $currency['symbol'] }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1">Separador decimal:
                                        {{ $currency['decimal_separator'] }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1">Separador de mil:
                                        {{ $currency['thousand_separator'] }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1">País:
                                        {{ $currency['country'] }}
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <p class="mb-1">Activado:
                                        @if ($currency['is_activated'])
                                            Si
                                        @else
                                            No
                                        @endif
                                    </p>
                                </div>
                            </div>



                            <div class="ml-3">





                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
