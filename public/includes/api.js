
const BASE_URL = 'https://api.digilysolutions.com/api';

//URL API - Categorias
export const fetchCategories = async () => {
    const response = await fetch(`${BASE_URL}/productcategories`);
    if (!response.ok) {
        throw new Error('Error al conectarse API de Categorías');
    }
    return  response;
};




export const fetchCategories1 = async () => {
    const response = await fetch(`${BASE_URL}/productcategories`);
    if (!response.ok) {
        throw new Error('Error al obtener categorías');
    }
    else
    {
        var categories = await response.json()
        if (categories.success){
            return categories.data;
        }
        else{
            alert('NO se puede obtener las categorías');
        } 
    }
};


export const addCategory = async (category) => {
    const response = await fetch(`${BASE_URL}/productcategory`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(category),
    });

    if (!response.ok) {
        throw new Error('Error al agregar categoría');
    }
    
    return await response.json();
};