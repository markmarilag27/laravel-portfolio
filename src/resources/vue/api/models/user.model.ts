export interface User {
  uuid: string
  name: string
  email: string
  email_verified_at: string
  updated_at: string
  created_at: string
}

export interface UserLoginCredential {
  email: string | null
  password: string | null
  errors: {
    email?: []
    password?: []
  }
}
