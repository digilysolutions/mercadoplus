$('#submit-comment').click(function() {  
    var message = $('#message').val();  
    var name = $('#name').val();  
    var phone = $('#phone').val();  
    var productId = $(this).data('id'); // El ID del producto actual  
   
    console.log('asdsd');
  
    console.log(productId);
    $.ajax({  
        url: '/reviews/add',  
        method: 'POST',  
        data: {   
            comment: message,  
            first_name: name,  
            phone: phone,  
            product_id: productId,  
            _token: $('meta[name="csrf-token"]').attr('content')
        },  
        success: function(data) {  
            console.log(data);
            var comment=data['data'];
         
            // Aquí puedes insertar el nuevo comentario en la sección de comentarios  
            $('#comments-section').prepend(`
                <div class="media mb-4">
                    <div  class="media-body">   
                        <h6>  ${comment['writer']['first_name'] ? comment['writer']['first_name'] : ''} 
                          ${comment['writer']['last_name'] ? comment['writer']['last_name'] : ''} <small>-  ${comment['date']}  <i></i></small></h6> 
                        <p>${ comment['comment'] }</p>
                    </div>
                </div>
           
        `); 
            $('#form-comment')[0].reset(); // Reiniciar el formulario  
        },  
        error: function(xhr) {  

            console.log(xhr.responseText);  
        }  
    });  
}); 

