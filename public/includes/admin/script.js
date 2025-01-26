// Asigna el evento para el primer input de archivo
document.getElementById('path_image').addEventListener('change', function(event) {
    load_change_image(event, "image-preview"); // Pasa el evento correcto y el ID de la imagen
});


    // Función que maneja la carga de la imagen
function load_change_image(event, image_preview) {
   
    const file = event.target.files[0]; // Obtiene el primer archivo seleccionado
    if (file) {
        const reader = new FileReader(); // Crea un nuevo FileReader

        // Define la función que se ejecutará cuando se lea el archivo
        reader.onload = function(e) {
            document.getElementById(image_preview).src = e.target
                .result; // Cambia la fuente de la imagen
        };

        reader.readAsDataURL(file); // Lee el archivo como una URL de datos
    }
}
