import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import PostDetail from './pages/PostDetail.vue';
import Error404 from './pages/Error404.vue';


const router = new VueRouter({
  mode: 'history',
  linkActiveClass: 'active',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/about',
      name: 'about',
      component: About
    },
    {
      path: '/blog',
      name: 'blog',
      component: Blog
    },
    {
      path: '/post/:slug',
      name: 'postDetail',
      component: PostDetail
    },
    {
      path: '/*',
      name: 'error404',
      component: Error404
    },
  ]
});

export default router;