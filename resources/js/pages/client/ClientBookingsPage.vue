<template>
    <GuestLayout hide-footer>
        <div class="website-width py-12">
            <div class="text-xl font-bold py-1">My Bookings</div>
            <DataTable :value="products">
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
            </DataTable>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref } from "vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import BookingState from "../../components/states/BookingState.vue";
import RoomTypeState from "../../components/states/RoomTypeState.vue";

const products = ref([
    {
        id: 1,
        booking_number: "#BOK-1",
        room: {
            name: "Room 1",
            type: "single",
            type_text: "Single",
        },
        status: "approved",
        status_text: "Approved",
    },
    {
        id: 2,
        booking_number: "#BOK-2",
        room: {
            name: "Room 2",
            type: "single",
            type_text: "Single",
        },
        status: "rejected",
        status_text: "Rejected",
    },
]);
</script>
