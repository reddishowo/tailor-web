import { createRouter, createWebHistory } from 'vue-router';
import About from '../views/Aboutpage.vue';
import Home from '../views/HomePage.vue';
import Services from '../components/Services.vue';
import ServicePage from '../views/ServicePage.vue';

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
    path: '/services',
    name: 'Services',
    component: Services,
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
  }
];

const router = createRouter({
  history: createWebHistory(),  
  routes,
});

export default router;