


const Product =()=> import('./components/products/AllProduct.vue');
const Create =()=> import('./components/products/CreateProduct.vue');
const Edit =()=> import('./components/products/EditProduct.vue');

export const routes = [
    {
        name: 'products',
        path: '/',
        component: Product
    },
    {
        name: 'create',
        path: '/create',
        component: Create
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: Edit
    }
];