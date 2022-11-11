import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(),
  strict: true,
  routes: [
    {
      path: '/dashboard',
      name: 'dashboard',
      component: () => import('@/pages/DashboardPage.vue'),
      meta: {
        requiresAuth: true
      }
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('@/pages/auth/LoginPage.vue'),
      meta: {
        requiresAuth: false
      }
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'not_found',
      component: () => import('@/pages/errors/NotFoundPage.vue')
    }
  ]
})

export default router
