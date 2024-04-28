function handleSuccessResponse(result) {
    if(result.data.message) {
        window.displayMessage(result.data.message)
    }
    return Promise.resolve(result.data)
}

function handleErrorResponse(result) {
    if(result.response.data.message) {
        window.displayError(result.response.data.message)
    }
    return Promise.reject(result.response)
}

export default {
    handleSuccessResponse,
    handleErrorResponse,
}
