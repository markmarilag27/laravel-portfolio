import axios, { type AxiosResponse } from 'axios'
import router from '@/router'
import { HTTP_STATUS_CODE } from '@/api/constants.api'
import { cookieStoreAuthBearer, COOKIE_AUTH_BEARER } from './cookie-auth'

const httpClient = axios.create({
  timeout: 10000,
  withCredentials: true,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
    Authorization: COOKIE_AUTH_BEARER
  }
})

httpClient.interceptors.response.use(
  (value: AxiosResponse<any, any>) => {
    const bearerToken = value.headers?.authorization
    if (bearerToken) {
      cookieStoreAuthBearer(bearerToken)
    }
    return value
  },
  (error: any) => {
    if (HTTP_STATUS_CODE.HTTP_SESSION_EXPIRED === error.response.status) {
      router.push({ name: 'login' })
    }
    return Promise.reject(error)
  }
)

export default httpClient
