import type { UserLoginCredential } from '@api/models'
import { QUERY_KEYS, DEFAULT_STALE_TIME } from '@api/constants.api'
import { useMutation, useQuery, useQueryClient } from '@tanstack/vue-query'
import authService from '@api/services/auth.service'

export const authGetCurrentUserInformation = () =>
  useQuery([QUERY_KEYS.AUTH_ME], () => authService.get(), {
    keepPreviousData: true,
    staleTime: DEFAULT_STALE_TIME
  })

export const authLogin = () => {
  const queryClient = useQueryClient()

  return useMutation(
    [QUERY_KEYS.AUTH_LOGIN],
    (credential: UserLoginCredential) => authService.login(credential),
    {
      onSuccess: () => {
        queryClient.invalidateQueries([QUERY_KEYS.AUTH_LOGIN])
      }
    }
  )
}

export const authLogout = () => {
  const queryClient = useQueryClient()

  return useQuery([QUERY_KEYS.AUTH_LOGOUT], () => authService.logout(), {
    onSuccess: () => {
      queryClient.invalidateQueries([QUERY_KEYS.AUTH_LOGIN, QUERY_KEYS.AUTH_ME])
    }
  })
}
