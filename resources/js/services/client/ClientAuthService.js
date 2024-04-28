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

export default {
    login,
    logout,
}
