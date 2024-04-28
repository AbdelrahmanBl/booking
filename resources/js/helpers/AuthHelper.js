const setAuthUser = (data) => localStorage.setItem('authUser', JSON.stringify(data))

function getAuthUser() {
    const user = localStorage.getItem('authUser')
    return user ? JSON.parse(user) : null
}

const setAccessToken = (token) => localStorage.setItem('accessToken', token)

const getAccessToken = ()  => localStorage.getItem('accessToken')

const isAuthUser = () => !! getAuthUser()

const isGuestUser = () => ! isAuthUser()

const isAuthAdmin = () => getAuthUser()?.type === 'admin'

const isAuthEmployee = () => getAuthUser()?.type === 'employee'

const isAuthAdminOrEmployee = () => isAuthAdmin() || isAuthEmployee()

const isAuthClient = () => getAuthUser()?.type === 'client'

function logout() {
    if(isAuthUser()) {
        localStorage.removeItem('accessToken')
        localStorage.removeItem('authUser')
    }
}

export default {
    setAuthUser,
    getAuthUser,
    setAccessToken,
    getAccessToken,
    isAuthUser,
    isGuestUser,
    isAuthAdmin,
    isAuthEmployee,
    isAuthClient,
    isAuthAdminOrEmployee,
    logout,
}
