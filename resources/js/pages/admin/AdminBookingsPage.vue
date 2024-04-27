<template>
    <AdminLayout>
        <DataTable :value="tableData">
            <Column field="booking_number" header="Booking Nnumber"></Column>
            <Column field="client.name" header="Client Name"></Column>
            <Column field="room.name" header="Room Name"></Column>
            <Column header="Room Type">
                <template #body="slots">
                    <RoomTypeState
                        :label="slots.data.room.type_text"
                        :value="slots.data.room.type"
                    />
                </template>
            </Column>
            <Column header="Room Status">
                <template #body="slots">
                    <RoomState
                        :label="slots.data.room.status_text"
                        :value="slots.data.room.status"
                    />
                </template>
            </Column>
            <Column header="Booking Status">
                <template #body="slots">
                    <BookingState
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
                        <ConfirmDialog
                            :id="slots.data.id"
                            :label="slots.data.booking_number"
                            type="approve"
                        />
                        <ConfirmDialog
                            :id="slots.data.id"
                            :label="slots.data.booking_number"
                            type="reject"
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
import ConfirmDialog from "../../components/dialogs/ConfirmDialog.vue";
import BookingState from "../../components/states/BookingState.vue";
import RoomState from "../../components/states/RoomState.vue";
import RoomTypeState from "../../components/states/RoomTypeState.vue";

const tableData = ref([
    {
        id: 1,
        booking_number: "#BOK-1",
        client: {
            id: 1,
            name: "Client 1",
        },
        room: {
            id: 1,
            name: "Room 1",
            type: "single",
            type_text: "Single",
            status: "available",
            status_text: "Available",
        },
        status: "approved",
        status_text: "Approved",
        created_at: "2024-04-27",
        updated_at: "منذ 7 ثواني",
    },
    {
        id: 2,
        booking_number: "#BOK-2",
        client: {
            id: 2,
            name: "Client 2",
        },
        room: {
            id: 2,
            name: "Room 2",
            type: "single",
            type_text: "Single",
            status: "available",
            status_text: "Available",
        },
        status: "rejected",
        status_text: "Rejected",
        created_at: "2024-04-27",
        updated_at: "منذ 7 ثواني",
    },
]);
</script>
