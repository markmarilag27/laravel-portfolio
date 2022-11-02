import { createRouter, createWebHistory } from 'vue-router'
const DashboardPage = () => import('@/pages/DashboardPage.vue')
const NotFoundPage = () => import('@/pages/errors/NotFoundPage.vue')
const LoginPage = () => import('@/pages/auth/LoginPage.vue')
const ForgotPasswordPage = () => import('@/pages/auth/ForgotPasswordPage.vue')
const EmailVerificationPage = () =>
  import('@/pages/auth/EmailVerificationPage.vue')

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/dashboard',
      name: 'dashboard',
      component: DashboardPage,
      meta: {
        requiresAuth: true
      },
      children: [
        {
          path: '/email-verification',
          name: 'email_verification',
          component: EmailVerificationPage,
          meta: {
            requiresAuth: true
          }
        }
      ]
    },
    {
      path: '/login',
      name: 'login',
      component: LoginPage,
      meta: {
        requiresAuth: false
      }
    },
    {
      path: '/forget-password',
      name: 'forget_password',
      component: ForgotPasswordPage,
      meta: {
        requiresAuth: false
      }
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'not_found',
      component: NotFoundPage
    }
  ]
})

export default router
