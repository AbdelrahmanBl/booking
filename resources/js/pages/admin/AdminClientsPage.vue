<template>
    <AdminLayout>
        <div>
            <ClientForm />
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
                        <ClientForm :model="slots.data" />
                        <DeleteDialog
                            :id="slots.data.id"
                            :label="slots.data.name"
                        />
                    </div>
                </template>
            </Column>
        </DataTable>
    </AdminLayout>
</template>

<script setup>
import { ref } from "vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import ClientForm from "../../components/forms/ClientForm.vue";
import DeleteDialog from "../../components/dialogs/DeleteDialog.vue";
import ActivationState from "../../components/states/ActivationState.vue";

const tableData = ref([
    {
        id: 1,
        name: "Client 1",
        email: "client1@gmail.com",
        is_active: true,
        created_at: "2024-04-27",
        updated_at: "منذ 7 ثواني",
    },
    {
        id: 2,
        name: "Client 2",
        email: "client2@gmail.com",
        is_active: true,
        created_at: "2024-04-27",
        updated_at: "منذ 7 ثواني",
    },
]);
</script>
