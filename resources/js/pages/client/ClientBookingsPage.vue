<template>
    <GuestLayout hide-footer>
        <div class="website-width py-12">
            <div class="text-xl font-bold py-1">My Bookings</div>
            <DataTable :value="products">
                <Column field="booking_number" header="Booking Number"></Column>
                <Column field="room.name" header="Room Name"></Column>
                <Column field="room.type" header="Room Type"></Column>
                <Column field="status" header="Booking Status"></Column>
            </DataTable>
        </div>
    </GuestLayout>
</template>

<script setup>
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import { ref } from "vue";

const products = ref([
    {
        id: 1,
        booking_number: "#BOK-1",
        room: {
            name: "Room 1",
            type: "Signle",
        },
        status: "Available",
    },
    {
        id: 2,
        booking_number: "#BOK-2",
        room: {
            name: "Room 2",
            type: "Signle",
        },
        status: "Available",
    },
]);
</script>
