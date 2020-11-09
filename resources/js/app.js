require('./bootstrap');

import Vue from 'vue';

Vue.component('posts-list', require('./components/PostsList').default);
Vue.component('post-list-item', require('./components/PostListItem').default);
Vue.component('pagination-links', require('./components/PaginationLinks').default);
Vue.component('paginator', require('./components/Paginator').default);
Vue.component('site-cover', require('./components/SiteCover').default);
Vue.component('container', require('./components/Container').default);
Vue.component('app-layout', require('./layouts/AppLayout').default);

import auth from './mixins/auth';
import router from './router';

Vue.mixin(auth);


const app = new Vue({
    el: '#app',
    router
});
