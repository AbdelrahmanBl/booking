import RequestHelper from "../../helpers/RequestHelper";

async function getTableData() {
    return RequestHelper.get("client/bookings")
    .then(response => Promise.resolve(response.data))
}

async function createBooking(data) {
    return RequestHelper.post(`client/bookings`, data)
    .then(() => Promise.resolve())
}

export default {
    getTableData,
    createBooking,
}
