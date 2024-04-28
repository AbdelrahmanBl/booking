import RequestHelper from "../../helpers/RequestHelper";

async function getTableData() {
    return RequestHelper.get('admin/bookings')
    .then(response => Promise.resolve(response.data))
}

async function updateRecord(id, data) {
    return RequestHelper.patch(`admin/bookings/${id}`, data)
    .then(response => Promise.resolve(response.data))
}

export default {
    getTableData,
    updateRecord,
}
