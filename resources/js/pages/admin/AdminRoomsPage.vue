<template>
    <AdminLayout>
        <div>
            <RoomForm
                :room-type-options="roomTypeOptions"
                :room-status-options="roomStatusOptions"
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
import RoomState from "../../components/states/RoomState.vue";
import RoomTypeState from "../../components/states/RoomTypeState.vue";
import RoomForm from "../../components/forms/RoomForm.vue";
import DeleteDialog from "../../components/dialogs/DeleteDialog.vue";

const tableData = ref([
    {
        id: 1,
        name: "Room 1",
        description:
            "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio quam consequatur aliquam sapiente suscipit adipisci nesciunt, modi doloribus alias aperiam, blanditiis assumenda quos, architecto fugiat? Consequatur, aspernatur? Nam, dolores perspiciatis!",
        type: "signle",
        type_text: "Signle",
        status: "available",
        status_text: "Available",
        created_at: "2024-04-27",
        updated_at: "منذ 7 ثواني",
    },
    {
        id: 2,
        name: "Room 2",
        description:
            "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio quam consequatur aliquam sapiente suscipit adipisci nesciunt, modi doloribus alias aperiam, blanditiis assumenda quos, architecto fugiat? Consequatur, aspernatur? Nam, dolores perspiciatis!",
        type: "signle",
        type_text: "Signle",
        status: "available",
        status_text: "Available",
        created_at: "2024-04-27",
        updated_at: "منذ 7 ثواني",
    },
]);

const roomTypeOptions = ref([{ label: "Signle ", value: "signle" }]);
const roomStatusOptions = ref([{ label: "Available ", value: "available" }]);
</script>
