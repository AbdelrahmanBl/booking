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
                            @update="handleUpdate"
                        />
                        <ConfirmDialog
                            :id="slots.data.id"
                            :label="slots.data.booking_number"
                            type="reject"
                            @update="handleUpdate"
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
import ConfirmDialog from "../../components/dialogs/ConfirmDialog.vue";
import BookingState from "../../components/states/BookingState.vue";
import RoomState from "../../components/states/RoomState.vue";
import RoomTypeState from "../../components/states/RoomTypeState.vue";
import AdminBookingService from "../../services/admin/AdminBookingService";

const tableData = ref([]);

const handleUpdate = (data) => {
    const index = tableData.value.findIndex(
        (tableItem) => tableItem.id === data.id
    );
    tableData.value[index] = data;
};

onMounted(() => {
    AdminBookingService.getTableData().then((data) => {
        tableData.value = data.tableData;
    });
});
</script>
