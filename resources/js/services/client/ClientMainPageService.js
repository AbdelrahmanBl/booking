import Helper from "../../helpers/Helper";
import RequestHelper from "../../helpers/RequestHelper";

async function getPageData(queryParams) {
    return RequestHelper.get("client/mainPage?" + Helper.encodeSearchParams(queryParams))
    .then(response => Promise.resolve(response.data))
}

async function getRoomData(id) {
    return RequestHelper.get(`client/rooms/${id}`)
    .then(response => Promise.resolve(response.data))
}

export default {
    getPageData,
    getRoomData,
}
