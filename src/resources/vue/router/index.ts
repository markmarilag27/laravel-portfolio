import { COOKIE_AUTH_BEARER } from '@/utils/cookie-auth'
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
      name: 'error',
      component: () => import('@/pages/errors/NotFoundPage.vue')
    }
  ]
})

router.beforeEach((to, from) => {
  if (to.meta.requiresAuth) {
    if (!COOKIE_AUTH_BEARER) {
      return { name: 'login' }
    }
  }

  if (!to.meta.requiresAuth) {
    if (COOKIE_AUTH_BEARER) {
      return { name: 'dashboard' }
    }
  }
})

export default router
