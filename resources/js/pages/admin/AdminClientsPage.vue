<template>
    <AdminLayout>
        <div>
            <ClientForm :key="createFormKey" @create="handleCreate" />
        </div>
        <DataTable :value="tableData">
            <Column field="name" header="Client Name"></Column>
            <Column field="email" header="Client Email"></Column>
            <Column header="Activation">
                <template #body="slots">
                    <ActivationState :value="slots.data.is_active" />
                </template>
            </Column>
            <Column
                class="whitespace-nowrap"
                field="created_at"
                header="Created"
            ></Column>
            <Column
                class="whitespace-nowrap"
                field="updated_at"
                header="Updated"
            ></Column>
            <Column header="Options">
                <template #body="slots">
                    <div class="flex gap-2">
                        <ClientForm
                            :model="slots.data"
                            @update="handleUpdate"
                        />
                        <DeleteDialog
                            :id="slots.data.id"
                            :label="slots.data.name"
                            :route="`admin/users/${slots.data.id}`"
                            @destroy="handleDelete(slots.data)"
                        />
                    </div>
                </template>
            </Column>
        </DataTable>
    </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from "vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import ClientForm from "../../components/forms/ClientForm.vue";
import DeleteDialog from "../../components/dialogs/DeleteDialog.vue";
import ActivationState from "../../components/states/ActivationState.vue";
import AdminClientService from "../../services/admin/AdminClientService";

const tableData = ref([]);
const createFormKey = ref(0);

const handleCreate = (data) => {
    tableData.value.push(data);
    createFormKey.value++;
};

const handleUpdate = (data) => {
    const index = tableData.value.findIndex(
        (tableItem) => tableItem.id === data.id
    );
    tableData.value[index] = data;
};

const handleDelete = (data) => {
    const index = tableData.value.findIndex(
        (tableItem) => tableItem.id === data.id
    );
    tableData.value.splice(index, 1);
};

onMounted(() => {
    AdminClientService.getTableData().then((data) => {
        tableData.value = data.tableData;
    });
});
</script>
