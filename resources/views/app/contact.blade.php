@extends('layouts.app')
@section('header-title')
    Isla de la Juventud - Servicio al Cliente
@endsection
@section('content')
 <!-- Breadcrumb Start -->
 <div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-orange-mobile" href="/">Inicio</a>
                <span class="breadcrumb-item text-dark-mobile active ">Contáctanos</span>
            </nav>
        </div>
    </div>
</div>
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">Contáctanos</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form id="sendMessage">

                        <div class="control-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tu Nombre"
                                required="required" data-validation-required-message="Por Favor, entre su nombre" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="phone" name="whatsapp"
                                placeholder="Número de Whatsapp" required="required"
                                data-validation-required-message="Por Favor,inserte su número de whatsapp" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Asunto"
                                required="required" data-validation-required-message="Por Favor, inserte el asunt " />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="8" name="message" id="message" placeholder="Mensaje" required="required"
                                data-validation-required-message="Por Favor, escriba su mensaje"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2938.257649907824!2d-82.81040597223311!3d21.897159843756082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2scu!4v1732352163023!5m2!1ses!2scu"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Micro 70, Nueva Gerona, Isla de
                        la Juventud</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>mercadoplus@digilysolutions.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+53 50987370</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

        $(document).ready(function() {

            $('#sendMessage').on('submit', function(event) {

                event.preventDefault(); // Evita el envío normal del formulario

                // Recoge los datos del formulario
                var formData = $(this)
                    .serialize(); // Convierte los datos del formulario a una cadena de consulta

                $.ajax({
                    type: 'POST', // Método HTTP
                    url: '/sendmessage', // Cambia esto a tu URL
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function(response) {
                        // Asumiendo que `response` incluye `whatsappUrl`
                        if (response) {
                            // Redirige a la URL de WhatsApp
                           // window.location.href = response;
                            window.open(response, '_blank'); // _blank abre en nueva pestaña
                        } else {
                            $('#success').html(
                                '<p>No se pudo obtener el enlace de WhatsApp.</p>');
                        }
                        $('#sendMessage')[0].reset();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {

                    }
                });

            });
        });
    </script>
@endsection
