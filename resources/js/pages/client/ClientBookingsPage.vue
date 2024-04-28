<template>
    <GuestLayout hide-footer>
        <div class="website-width py-12">
            <div class="text-xl font-bold py-1">My Bookings</div>
            <DataTable :value="tableData">
                <Column header="Room Image">
                    <template #body="slots">
                        <img
                            height="60"
                            width="60"
                            :src="slots.data.room.image"
                            alt="Room"
                        />
                    </template>
                </Column>
                <Column field="booking_number" header="Booking Number"></Column>
                <Column field="room.name" header="Room Name"></Column>
                <Column header="Room Type">
                    <template #body="slots">
                        <RoomTypeState
                            :label="slots.data.room.type_text"
                            :value="slots.data.room.type"
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
            </DataTable>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, onMounted } from "vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import BookingState from "../../components/states/BookingState.vue";
import RoomTypeState from "../../components/states/RoomTypeState.vue";
import ClientBookingService from "../../services/client/ClientBookingService";

const tableData = ref([]);

onMounted(() => {
    ClientBookingService.getTableData().then((data) => {
        tableData.value = data.tableData;
    });
});
</script>
