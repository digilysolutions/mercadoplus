// js/main.js


import { menuHeaderCategories,menuFooterCategories,CategoryList_select,tableListCategoriesAdmin } from './app/category.js';


const { pathname } = window.location;
if (pathname === '/shopily/index.html') {   
    menuHeaderCategories(); 
    menuFooterCategories(); 
    
} else if (pathname === '/venta.html') {
    initPurchases();
} else if (pathname === '/shopily/admin/index.html') {
    CategoryList_select();
}
else if (pathname === '/shopily/admin/add-category.html') {   
    tableListCategoriesAdmin();
}