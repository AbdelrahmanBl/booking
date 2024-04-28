import RequestHelper from "../../helpers/RequestHelper";

async function getTableData() {
    return RequestHelper.get('admin/users')
    .then(response => Promise.resolve(response.data))
}

async function createRecord(data) {
    return RequestHelper.post('admin/users', data)
    .then(response => Promise.resolve(response.data))
}

async function updateRecord(id, data) {
    return RequestHelper.patch(`admin/users/${id}`, data)
    .then(response => Promise.resolve(response.data))
}

export default {
    getTableData,
    createRecord,
    updateRecord,
}
