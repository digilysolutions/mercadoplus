// js/category.js

import { fetchCategories } from '../api.js';

//Obtener la lista de categorias
export const getList = async () => { 

const allCategories = await fetchCategories();
 var categories =await allCategories.json();
if (categories.success){
    return categories.data;   
}
else{
    alert('NO se puede obtener las categorías');
} 
};

//Detalles de una categoria

//Eliminar una categoria

//Adicionar Categoria

//Actualizar Categoria


//---------------------Pintar HTML---------------------

export const menuHeaderCategories = async () => {     
    const categories = await getList();
     const listContainer = document.getElementById('categoryListContainer');
     listContainer.innerHTML = ''; // Limpiar el contenedor antes de actualizar    
     categories.forEach(category => {
         const a = document.createElement('a');
         a.href = "#"; // Puedes especificar el enlace al que debe llevar, por ejemplo, algún ID o URL.
         a.className = "nav-item nav-link"; // Clases CSS de Bootstrap si las estás usando
         a.textContent = category.name; // El nombre de la categoría
         listContainer.appendChild(a); // Adjuntamos el enlace al contenedor
     });  
 };

 export const menuFooterCategories = async () => {     
    const categories = await getList(); // Obtener la lista de categorías
    const listContainer = document.getElementById('categoryListFooterContainer'); 
    listContainer.innerHTML = ''; // Limpiar el contenedor antes de actualizar    
    
    categories.forEach(category => {
        const a = document.createElement('a'); // Crear el elemento <a>
        a.href = "#"; // Especifica aquí la dirección correcta si necesitas enlazar a algo
        a.className = "text-secondary mb-2"; // Clases CSS para estilizar el enlace
        a.innerHTML = `<i class="fa fa-angle-right mr-2"></i>${category.name}`; // Añadir el ícono y el nombre de la categoría
        listContainer.appendChild(a); // Adjuntar el enlace al contenedor
    });  
};



export const tableListCategoriesAdmin = async () => {    

    const categories = await getList();
    const listContainer = document.getElementById('categoryListContainerAdmin');
    listContainer.innerHTML = ''; // Limpiar el contenedor antes de actualizar    

    categories.forEach(category => {
        const row = document.createElement('tr');
        
        // Checkbox
        const checkboxCell = document.createElement('td');
        const checkboxDiv = document.createElement('div');
        checkboxDiv.className = "checkbox d-inline-block";
        
        const checkboxInput = document.createElement('input');
        checkboxInput.type = "checkbox"; 
        checkboxInput.className = "checkbox-input"; 
        checkboxInput.id = `checkbox-${category.id}`; // Asumimos que hay un ID

        const checkboxLabel = document.createElement('label');
        checkboxLabel.setAttribute('for', checkboxInput.id);
        checkboxLabel.className = "mb-0";
        
        checkboxDiv.appendChild(checkboxInput);
        checkboxDiv.appendChild(checkboxLabel);
        checkboxCell.appendChild(checkboxDiv);
        row.appendChild(checkboxCell);

        // Imagen y nombre del producto
        const productCell = document.createElement('td');
        const productDiv = document.createElement('div');
        productDiv.className = "d-flex align-items-center";
        
        const productImg = document.createElement('img');
      // Suponiendo que `productImg` es un elemento de imagen en tu documento
if (!category.path_image || category.path_image.trim() === '') {
    productImg.src = 'assets/images/upload/no-picture.jpg'; // Ruta por defecto
} else {
    productImg.src ='..'+ category.path_image; // Asigna la URL de la imagen de la categoría
}
        productImg.className = "img-fluid rounded avatar-50 mr-3";
        productImg.alt = category.description; // Puedes cambiar la descripción alternativa

        const productInfoDiv = document.createElement('div');
        productInfoDiv.innerHTML = `${category.name}<p class="mb-0"></p>`;

        productDiv.appendChild(productImg);
        productDiv.appendChild(productInfoDiv);
        productCell.appendChild(productDiv);
        row.appendChild(productCell);

        // Código del producto
        const codeCell = document.createElement('td');
        codeCell.textContent = category.description; // Asegúrate de que `category.code` existe
        row.appendChild(codeCell);

        // Categoría
        const categoryCell = document.createElement('td');
        categoryCell.textContent = category.count_products.length; // Suponiendo que también hay un nombre de categoría
        row.appendChild(categoryCell);

        // Acciones
        const actionsCell = document.createElement('td');
        const actionsDiv = document.createElement('div');
        actionsDiv.className = "d-flex align-items-center list-action";
        
        // Ver
        const viewLink = document.createElement('a');
        viewLink.className = "badge badge-info mr-2";
        viewLink.href = "#"; // Cambiar a la URL correspondiente
        viewLink.setAttribute('data-toggle', 'tooltip');
        viewLink.setAttribute('data-placement', 'top');
        viewLink.setAttribute('data-original-title', "Ver");

        viewLink.innerHTML = '<i class="ri-eye-line mr-0"></i>';
        actionsDiv.appendChild(viewLink);
        
        // Editar
        const editLink = document.createElement('a');
        editLink.className = "badge bg-success mr-2";
        editLink.href = "#"; // Cambiar a la URL correspondiente
        editLink.setAttribute('data-toggle', 'tooltip');
        editLink.setAttribute('data-placement', 'top');
        editLink.setAttribute('data-original-title', "Editar");
        editLink.innerHTML = '<i class="ri-pencil-line mr-0"></i>';
        actionsDiv.appendChild(editLink);

        // Eliminar
        const deleteLink = document.createElement('a');
        deleteLink.className = "badge bg-warning mr-2";
        deleteLink.href = "#"; // Cambiar a la URL correspondiente
        deleteLink.setAttribute('data-toggle', 'tooltip');
        deleteLink.setAttribute('data-placement', 'top');
        deleteLink.setAttribute('data-original-title', "Eliminar");
        deleteLink.innerHTML = '<i class="ri-delete-bin-line mr-0"></i>';
        actionsDiv.appendChild(deleteLink);

        actionsCell.appendChild(actionsDiv);
        row.appendChild(actionsCell);

        // Agregar la fila a la tabla
        listContainer.appendChild(row);
    });
};




export const CategoryList = async () => {  
   const categories = await fetchCategories();
   
    const listContainer = document.getElementById('categoryListContainer');
    listContainer.innerHTML = ''; // Limpiar el contenedor antes de actualizar    
    categories.forEach(category => {
        const a = document.createElement('a');
        a.href = "#"; // Puedes especificar el enlace al que debe llevar, por ejemplo, algún ID o URL.
        a.className = "nav-item nav-link"; // Clases CSS de Bootstrap si las estás usando
        a.textContent = category.name; // El nombre de la categoría
        listContainer.appendChild(a); // Adjuntamos el enlace al contenedor
    });  
};

/***** para adicionar categoria en el admin*/
/*
const createCategoryForm = (onCategoryAdded) => {
    const formContainer = document.getElementById('categoryFormContainer');

    const form = document.createElement('form');
    form.innerHTML = `
        <input type="text" id="categoryName" placeholder="Nombre de la categoría" required>
        <button type="submit">Agregar Categoría</button>
    `;
    
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const categoryName = document.getElementById('categoryName').value.trim();
        if (categoryName) {
            try {
                const newCategory = await addCategory({ name: categoryName });
                onCategoryAdded(newCategory);
                form.reset();
            } catch (error) {
                console.error(error);
                alert('No se pudo agregar la categoría');
            }
        }
    });

    formContainer.appendChild(form);
};
*/

// Función para inicializar el formulario de categoría en admin.html
export const initAdminCategories = () => {
    createCategoryForm((newCategory) => {
        // Actualiza la lista de categorías al añadir una nueva
        const categoriesContainer = document.getElementById('categoryListContainer');
        const ul = categoriesContainer.querySelector('ul') || document.createElement('ul');
        const li = document.createElement('li');
        li.textContent = newCategory.name;
        ul.appendChild(li);
        categoriesContainer.appendChild(ul);
    });
};
/*
export const CategoryList_select = async () => {  
    const categories = await fetchCategories();
    const selectElement = document.getElementById('category_parent');
    selectElement.innerHTML = '<option value="">Selecciona una categoría</option>'; // Opción por defecto

    categories.forEach(category => {
        const option = document.createElement('option');
        alert(category.id)
        option.value = category.id; // Opción que se usará como valor
        option.textContent = category.name; // Texto que se mostrará en el select
        selectElement.appendChild(option); // Agregar la opción al select
    });
 };*/


 export const CategoryList_select = async () => {  
    const categories = await fetchCategories();
    const selectElement = document.getElementById('category_parent');
    selectElement.innerHTML = '<option value="">Selecciona una categoría</option>'; // Opción por defecto

    // Mapa para almacenar categorías por su parent
    const categoryMap = {};
    const topLevelCategories = [];
    
    // Primero, organizamos las categorías en el mapa
    categories.forEach(category => {
        // Si no tiene parent, la añadimos a las categorías de nivel superior
        if (!category.category_parent) {
            topLevelCategories.push(category);
        } else {
            // Si tiene parent, la añadimos al mapa bajo su parent
            if (!categoryMap[category.category_parent]) {
                categoryMap[category.category_parent] = [];
            }
            categoryMap[category.category_parent].push(category);
        }
    });

    // Agregar categorías de nivel superior y sus subcategorías al select
    topLevelCategories.forEach(category => {
        const option = document.createElement('option');
        option.value = category.id;
        option.textContent = category.name; // Texto que se mostrará en el select
        selectElement.appendChild(option); // Agregar la opción al select

        // Si tiene subcategorías, las añadimos también
        const subCategories = categoryMap[category.id];
        if (subCategories) {
            subCategories.forEach(subCategory => {
                const subOption = document.createElement('option');
                subOption.value = subCategory.id;
                subOption.textContent = '-- ' + subCategory.name; // Prefijo para subcategorías
                selectElement.appendChild(subOption); // Agregar la opción de subcategoría
            });
        }
    });
};




 $(document).ready(function() {
    document.getElementById('addCategoryForm').addEventListener('submit', async function(event) {
        event.preventDefault(); // Prevenir el comportamiento por defecto del formulario
        // Recoger datos del formulario   


  // Limpiar mensajes anteriores
  const responseMessage = document.getElementById('responseMessage');

       


        const categoryData = {
            name: $('#name_category').val(),
            short_code: $('#short_code').val(),
            category_parent: $('#category_parent').val(),
            description: $('#description_category').val(),
            path_image:  $('#path_image').val(),
            product_category_parent: $('#product_category_parent').val(),
            is_activated: $('#is_activated').val() === 'true' // Convertir a booleano
        };
        addCategory(categoryData); // Llamar a la función para agregar la categoría
       

    });
});




// Función para enviar la nueva categoría a la API
 async function addCategory(categoryData) {
    try {
     
        const  response= await fetch('https://api.digilysolutions.com/api/productcategories', {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(categoryData),
        });
      
        if (!response.ok) {
            throw new Error('Error al agregar categoría');
        }

        const result = await response.json();
        
        if (result.success) {
            alert('Categoría agregada exitosamente');
            // Puedes limpiar el formulario o recargar la lista de categorías aquí
            document.getElementById('addCategoryForm').reset(); // Limpiar el formulario
            tableListCategoriesAdmin();
        } else {
            console.error('Error en la respuesta:', result.message);
            alert('No se pudo agregar la categoría: ' + result.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error al agregar la categoría: ' + error.message);
    }
}




$(document).ready(function() {
    $('#categoryForm').on('submit', function(event) {
        event.preventDefault(); // Evitar el envío del formulario

        // Recoger datos del formulario
        const formData = {
            name: $('#name').val(),
            short_code: $('#short_code').val(),
            category_parent: $('#category_parent').val(),
            description: $('#description').val(),
            path_image: $('#path_image').val(),
            is_activated: $('#is_activated').val(),
            _token: $('input[name="_token"]').val(), // Agregar el token CSRF
        };

        // Realizar la solicitud AJAX
        $.ajax({
            url: '/categories',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                $('#message').removeClass('alert-danger').addClass('alert-success').text('Categoría creada exitosamente.').show();
                // Opcionalmente, puedes limpiar el formulario
                $('#categoryForm')[0].reset();
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let message = 'Error al crear la categoría:';
                for (const [key, value] of Object.entries(errors)) {
                    message += `<br>${value[0]}`; // Solo mostrar el primer error
                }
                $('#message').removeClass('alert-success').addClass('alert-danger').html(message).show();
            }
        });
    });
});

