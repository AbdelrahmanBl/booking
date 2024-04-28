function encodeSearchParams(params) {
    const encodedParams = [];
    for (let [key, value] of Object.entries(params)) {
      encodedParams.push(`${encodeURIComponent(key)}=${encodeURIComponent(value ?? '')}`);
    }
    return encodedParams.join('&');
}

export default {
    encodeSearchParams,
}
