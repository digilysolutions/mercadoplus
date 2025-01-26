
$(document).ready(function() {              

    $('.yes-delete-countrycurrency').on('click', function() {      
        var id = $(this).data('id');        
        $.ajax({
            url: '/admin/countriescurrencies/' +
            id, // Asegúrate de que esta ruta esté correcta
            method: 'delete',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#deleteModal_'+id).modal('hide'); // Cerrar el modal
                window.location.href = '/admin/countriescurrencies';

            },
            error: function() {
                alert('Error al eliminar la tasa cambiaria.');
            }
        });
    });
});

function closeChildModal(id) {
    alert(id);
    $('#countrycurrencyShowModal'+id).modal('hide');
}

// Opcional: también puedes manejar el evento `hidden.bs.modal` del modal hijo para asegurarte de que no afecta al modal padre.
$('.childModal').on('hidden.bs.modal', function (e) {
    // Aquí puedes realizar acciones adicionales si lo deseas
});


function closeChildModal() {
    
    // Cerrar únicamente el modal hijo
    $('.childModal').modal('hide');
}

// Abrir el modal hijo cuando se presiona el botón
$('#openChildModal').on('click', function() {
    $('#childModal').modal('show');
});



 function exchange_rate(currency, price)
    {
        /*
        $priceInCurrency = 0;
        if ($currency == $this->code_currency_default) {
            $priceInCurrency = $price / $this->exchange_rate;
        }
        if ($currency == $this->code_currency_default)
        {
            //la primera es la moneda actual la segunda es la que se le va a aplicar tasa de cambio 
            /// mn  - usd   si la es default mn / tasa de cambio de la usd   price / $this->exchange_rate (usd)
            // mn - mlc     si la es default mn/ tasa de cambio de la mlc   price / $this->exchange_rate (mlc)
            // mlc- mn      SI currency != default  y    currency_id (vurrency) es default entonces  price *  $this->exchange_rate 
            // mlc- mn      SI currency != default  y    currency_id (vurrency) es default entonces  price *  $this->exchange_rate 
            //usd - mn      
            // usd - mlc    SI NO SE 
            //mlc  uds

        }*/

        return $priceInCurrency; // Convertir CUP a USD  
    }