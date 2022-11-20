import Cookies from 'js-cookie'

export const COOKIE_AUTH_BEARER_KEY = 'authorization'
export const COOKIE_AUTH_BEARER = Cookies.get(COOKIE_AUTH_BEARER_KEY) ?? null

export const cookieStoreAuthBearer = (bearerToken: string): void => {
  if (!COOKIE_AUTH_BEARER) {
    Cookies.set(COOKIE_AUTH_BEARER_KEY, bearerToken)
  }
}

export const cookieDestroyAuthBearer = (): void => {
  Cookies.remove(COOKIE_AUTH_BEARER_KEY)
}
