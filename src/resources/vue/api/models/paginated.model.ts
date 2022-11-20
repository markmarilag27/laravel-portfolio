interface PaginationLinks {
  first: string
  last: string
  next: string
  prev: string
}

interface PaginationMetaLinks {
  active: boolean
  label: string
  url: string
}

interface PaginationMeta {
  current_page: number
  from: number
  last_page: number
  links: PaginationMetaLinks[]
  path: string
  per_page: number
  to: number
  total: number
}

export interface Paginated<T> {
  data: T[]
  links: PaginationLinks
  meta: PaginationMeta
}
