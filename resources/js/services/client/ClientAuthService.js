import RequestHelper from "../../helpers/RequestHelper";
import AuthHelper from "../../helpers/AuthHelper";


async function login(data) {
    return RequestHelper.post('client/login', data)
    .then(response => {
        AuthHelper.setAccessToken(response.data.token)
        AuthHelper.setAuthUser(response.data.profile)
        return Promise.resolve()
    })
    .catch(() => Promise.reject(data.password = ''))
}

async function logout() {
    return RequestHelper.get('client/logout')
    .then(() => {
        AuthHelper.logout()
    })
}

async function register(data) {
    return RequestHelper.post('client/register', data)
    .then(() => Promise.resolve())
    .catch(() => Promise.reject(() => {
        data.password = ''
        data.password_confirmation = ''
    }))
}

export default {
    login,
    logout,
    register,
}
