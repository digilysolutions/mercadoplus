// Asigna el evento para el primer input de archivo
document.getElementById('path_image11').addEventListener('change', function(event) {
    load_change_image(event, "image-preview11"); // Pasa el evento correcto y el ID de la imagen
});

// Asigna el evento para el segundo input de archivo
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
            document.getElementById(image_preview).src = e.target.result; // Cambia la fuente de la imagen
        };

        reader.readAsDataURL(file); // Lee el archivo como una URL de datos
    }
}
/*
// Configura el manejo de carga de imagen
document.getElementById('picture-category').addEventListener('change', function(event) {
    const file = event.target.files[0]; // Obtiene el primer archivo seleccionado
    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            // Determina qué botón fue presionado y establece la imagen correspondiente
            if (event.currentTarget.dataset.target) {
                document.getElementById(event.currentTarget.dataset.target).src = e.target.result; // Cambia la fuente de la imagen
                document.getElementById(event.currentTarget.dataset.target).style.display = 'block'; // Muestra la imagen
            }
        }

        reader.readAsDataURL(file); // Lee el archivo como una URL de datos
    }
});

 // Agrega eventos a los botones para cargar imágenes
 document.getElementById('load-image-1').addEventListener('click', function() {
    const input = document.getElementById('picture-category');
    input.dataset.target = 'image-preview-1'; // Establece el destino de la imagen
    input.click(); // Simula un clic en el input
});

document.getElementById('img-add-category').addEventListener('click', function() {
    const input = document.getElementById('picture-category');
    input.dataset.target = 'image-preview-2'; // Establece el destino de la imagen
    input.click(); // Simula un clic en el input
});*/
