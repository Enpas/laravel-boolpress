
 import App from './App.vue';

 import router from './routes';

window.Vue = require('vue');



const app = new Vue({
    el: '#app',
    router,
    render: h => h(App),
});
