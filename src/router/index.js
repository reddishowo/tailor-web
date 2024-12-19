import { createRouter, createWebHistory } from 'vue-router';
import About from '../views/AboutPage.vue';
import Home from '../views/HomePage.vue';
import ServicePage from '../views/ServicePage.vue';
import ListingPage from '../views/ListingPage.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/about',
    name: 'About',
    component: About,
  },
  {
    path: '/servicepage',
    name: 'Servicepage',
    component: ServicePage,
  },
  {
    path: '/products',
    name: 'products.index',
    component: () => import('../views/Products/index.vue'),
  },
  {
    path: '/orders',
    name: 'orders.index',
    component: () => import('../views/Orders/index.vue'),
  },
  {
    path: '/listing',
    name: 'Listing',
    component: ListingPage,
  }
];

const router = createRouter({
  history: createWebHistory(),  
  routes,
});

export default router;