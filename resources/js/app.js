

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import WelcomeAdmin from './components/WelcomeAdmin'
import Menuadmin from'./components/MenuAdmin'

import CreatePost from'./components/CreatePost'
import AllPosts from './components/AllPosts'
import EditPosts from './components/EditPosts'

import AllCategories from './components/AllCategories'
import EditCategory from './components/EditCategory'
import CreateCategory from './components/CreateCategory'

import HomepagePosts from './components/HomepagePosts'
import ReadPost from './components/ReadPost'
import Menuhomepage from './components/Menuhomepage'
import About from './components/About'

 
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'homepageposts',
            component: HomepagePosts,
        },
        {
            path: '/read/:slug',
            name: 'readpost',
            component: ReadPost,
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        },
        {
          path: '/admin/dashboard',
          name: 'dashboard',
          component: WelcomeAdmin,
        },
        {
            path: '/admin/createpost',
            name: 'createpost',
            component: CreatePost,
            props:true
        },
        {
            path: '/admin/allposts',
            name: 'allposts',
            component: AllPosts,
            props: true,
        },
        {
            path: '/admin/editposts/:postId/edit',
            name: 'editposts',
            component: EditPosts,
            props: true,
        },
        {
            path: '/admin/allcategories',
            name: 'allcategories',
            component: AllCategories,
            props: true,
        },
        {
            path: '/admin/editcategory/:categoryId/edit',
            name: 'editcategory',
            component: EditCategory,
            props: true,
        },
        {
            path: '/admin/createcategory',
            name: 'createcategory',
            component: CreateCategory,
            props: true,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components:{
        Menuadmin,
        Menuhomepage
    },
    router
});
