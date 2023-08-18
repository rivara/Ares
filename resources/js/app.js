import './bootstrap';

// import { createApp } from 'vue'
// import HelloWorld from './HelloWorld.vue'
//  createApp(HelloWorld).mount('#app');

//Imporatacion VUE

// import {aa} from 'vue';
// window.Vue = require('vue').default;
// import App  from './components/App.vue';


import {createApp} from 'vue'

import App from './components/App.vue';

createApp(App).mount("#app")




//importacion Axios 
import VueAxios from 'vue-axios';
import axios from 'axios';

//importamos y modificamos el vue-routes
import VueRouter from 'vue-router';
import { routes } from './routes';
Vue.use(VueRouter);
Vue.use(VueAxios,axios);
    
const router=new VueRouter({
    mode:'history',
    routes:routes
});


// const app= new Vue({
//     el:'#app',
//     router:router,
//     render:h =>h(App)
// })