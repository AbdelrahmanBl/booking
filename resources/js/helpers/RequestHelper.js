import axios from 'axios';
import AuthHelper from './AuthHelper';
import ResponseHelper from './ResponseHelper';

const domain = `${location.origin}/api`

const config = {
    headers: {
        Accept: 'application/json',
        Authorization: 'Bearer ' + AuthHelper.getAccessToken()
    }
}

async function get(route)
{
    return axios.get(`${domain}/${route}`, config)
    .then(result =>  ResponseHelper.handleSuccessResponse(result))
    .catch(result => ResponseHelper.handleErrorResponse(result))
}

async function post(route, data)
{
    return axios.post(`${domain}/${route}`, data, config)
    .then(result =>  ResponseHelper.handleSuccessResponse(result))
    .catch(result => ResponseHelper.handleErrorResponse(result))
}

async function patch(route, data)
{
    return axios.patch(`${domain}/${route}`, data, config)
    .then(result =>  ResponseHelper.handleSuccessResponse(result))
    .catch(result => ResponseHelper.handleErrorResponse(result))
}

async function destroy(route)
{
    return axios.delete(`${domain}/${route}`, config)
    .then(result =>  ResponseHelper.handleSuccessResponse(result))
    .catch(result => ResponseHelper.handleErrorResponse(result))
}

export default {
    get,
    post,
    patch,
    destroy,
}
