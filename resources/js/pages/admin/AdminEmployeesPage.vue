<template>
    <AdminLayout>
        <div>
            <EmployeeForm :employee-type-options="employeeTypeOptions" />
        </div>
        <DataTable :value="tableData">
            <Column field="name" header="Employee Name"></Column>
            <Column field="email" header="Employee Email"></Column>
            <Column header="Employee Type">
                <template #body="slots">
                    <EmployeeTypeState
                        :label="slots.data.type_text"
                        :value="slots.data.type"
                    />
                </template>
            </Column>
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
                        <EmployeeForm
                            :model="slots.data"
                            :employee-type-options="employeeTypeOptions"
                        />
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
import EmployeeTypeState from "../../components/states/EmployeeTypeState.vue";
import EmployeeForm from "../../components/forms/EmployeeForm.vue";
import DeleteDialog from "../../components/dialogs/DeleteDialog.vue";
import ActivationState from "../../components/states/ActivationState.vue";

const tableData = ref([
    {
        id: 1,
        name: "Employee 1",
        email: "employee1@gmail.com",
        type: "admin",
        type_text: "Admin",
        is_active: true,
        created_at: "2024-04-27",
        updated_at: "منذ 7 ثواني",
    },
    {
        id: 2,
        name: "Employee 2",
        email: "employee2@gmail.com",
        type: "employee",
        type_text: "Employee",
        is_active: false,
        created_at: "2024-04-27",
        updated_at: "منذ 7 ثواني",
    },
]);

const employeeTypeOptions = ref([{ label: "Admin ", value: "admin" }]);
</script>
