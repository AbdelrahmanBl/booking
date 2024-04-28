<template>
    <AdminLayout>
        <div>
            <RoomForm
                :key="createFormKey"
                :room-type-options="roomTypeOptions"
                :room-status-options="roomStatusOptions"
                @create="handleCreate"
            />
        </div>
        <DataTable :value="tableData">
            <Column field="name" header="Room Name"></Column>
            <Column field="description" header="Description"></Column>
            <Column header="Room Type">
                <template #body="slots">
                    <RoomTypeState
                        :label="slots.data.type_text"
                        :value="slots.data.type"
                    />
                </template>
            </Column>
            <Column header="Booking Status">
                <template #body="slots">
                    <RoomState
                        :label="slots.data.status_text"
                        :value="slots.data.status"
                    />
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
                        <RoomForm
                            :model="slots.data"
                            :room-type-options="roomTypeOptions"
                            :room-status-options="roomStatusOptions"
                            @update="handleUpdate"
                        />
                        <DeleteDialog
                            :id="slots.data.id"
                            :label="slots.data.name"
                            :route="`admin/rooms/${slots.data.id}`"
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
import RoomState from "../../components/states/RoomState.vue";
import RoomTypeState from "../../components/states/RoomTypeState.vue";
import RoomForm from "../../components/forms/RoomForm.vue";
import DeleteDialog from "../../components/dialogs/DeleteDialog.vue";
import AdminRoomService from "../../services/admin/AdminRoomService";

const tableData = ref([]);
const roomTypeOptions = ref([]);
const roomStatusOptions = ref([]);
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
    AdminRoomService.getTableData().then((data) => {
        roomTypeOptions.value = data.roomTypeOptions;
        roomStatusOptions.value = data.roomStatusOptions;
        tableData.value = data.tableData;
    });
});
</script>
