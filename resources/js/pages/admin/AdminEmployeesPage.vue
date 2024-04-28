<template>
    <AdminLayout>
        <div>
            <EmployeeForm
                :key="createFormKey"
                :employee-type-options="employeeTypeOptions"
                @create="handleCreate"
            />
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
                            @update="handleUpdate"
                        />
                        <DeleteDialog
                            :id="slots.data.id"
                            :label="slots.data.name"
                            :route="`admin/employees/${slots.data.id}`"
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
import EmployeeTypeState from "../../components/states/EmployeeTypeState.vue";
import EmployeeForm from "../../components/forms/EmployeeForm.vue";
import DeleteDialog from "../../components/dialogs/DeleteDialog.vue";
import ActivationState from "../../components/states/ActivationState.vue";
import AdminEmployeeService from "../../services/admin/AdminEmployeeService";

const tableData = ref([]);
const employeeTypeOptions = ref([]);
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
    AdminEmployeeService.getTableData().then((data) => {
        employeeTypeOptions.value = data.employeeTypeOptions;
        tableData.value = data.tableData;
    });
});
</script>
