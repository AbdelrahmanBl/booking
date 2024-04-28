function setAuthUser(data) {
    localStorage.setItem('authUser', JSON.stringify(data))
}

function getAuthUser() {
    const user = localStorage.getItem('authUser')
    return user ? JSON.parse(user) : null
}

function setAccessToken(token) {
    localStorage.setItem('accessToken', token)
}

function getAccessToken() {
    return localStorage.getItem('accessToken')
}

function isAuthUser() {
    return !! getAuthUser()
}

function isGuestUser() {
    return ! isAuthUser()
}

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
    logout,
}
