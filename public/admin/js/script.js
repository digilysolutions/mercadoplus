/*const apiUrl = 'https://api.digilysolutions.com/api/productcategory/';

// Función para obtener datos de la API y mostrar en la tabla
a  sync function fetchData() {
      try {
          const response = await fetch(apiUrl);
          if (!response.ok) {
              throw new Error('Error en la respuesta de la API');
          }
          const data = await response.json();


                // Obtener la referencia al tbody de la tabla
        con  st tbody = document.querySelector('#datatable tbody');

        //   Limpiar la tabla antes de agregar nuevos datos
        tbody.  innerHTML = '';

        // Ite  rar sobre los datos y llenar la tabla

        data['da  ta       '].forEach(item => {

            const   ro           w = document.createElement('tr');
            row.inner  HTML = `
                <td>${  item.id}</td>
                <td>${i  tem.name}</td>
                <td>${it  em.category_parent}</td>
                <!-- Agre ga más columnas según tus datos -->
            `;
              tbody.appendChi  ld(row);
        });
    } catch (err  or) {
          console.error('Error a  l obtener los datos:', error);
    }
}

// Llamar a la función   para o  bte  ner los datos cuando la página se cargue
window.onload = fetchData;  */
