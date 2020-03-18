/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// Import vuetify
import Vuetify from 'vuetify';
Vue.use(Vuetify);

// Themes
const vuetify = new Vuetify({
    theme: {
        themes: {
            light: {
                primary: '#3F51B5',
            },
            dark: {
                primary: '#3F51B5',
            },
        },
    },
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('main-menu', require('./components/Menu.vue').default);
Vue.component('main-card', require('./components/MainCard.vue').default);
Vue.component('combobox', require('./components/Combobox.vue').default);
Vue.component('body-card', require('./components/BodyCard.vue').default);
Vue.component('logo-card', require('./components/LogoCard.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
});
