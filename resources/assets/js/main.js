import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Example from './components/Example.vue'

const router = new VueRouter({
  mode: 'history',
  base: __dirname,
  routes: [
    { path: '/admin/article/add', component: Example }
  ]
})

new Vue(Vue.util.extend({ router }, App)).$mount('#app')
