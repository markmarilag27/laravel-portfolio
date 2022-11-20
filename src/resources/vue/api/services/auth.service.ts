import httpClient from '@/utils/http-client.util'
import type { UserLoginCredential } from '@api/models'
import type { AxiosResponse } from 'axios'

const endpoint = {
  me: '/api/auth/me',
  login: '/api/auth/login',
  logout: '/api/auth/logout'
}

const authService = {
  get: (): Promise<AxiosResponse<any, any>> => httpClient.get(endpoint.me),
  login: (credential: UserLoginCredential): Promise<AxiosResponse<any, any>> =>
    httpClient.post(endpoint.login, credential),
  logout: (): Promise<AxiosResponse<any, any>> =>
    httpClient.post(endpoint.logout)
}

export default authService
