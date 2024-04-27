<template>
    <GuestLayout>
        <div>
            <img class="w-full h-[100vh]" :src="asset('booking.png')" alt="" />
        </div>
        <div class="website-width py-6">
            <div class="text-center font-bold text-2xl">Book A Room Now</div>
            <div class="my-2">
                <div class="text-xl font-bold">Filter Options</div>
                <InputText
                    type="text"
                    placeholder="Enter room name to search..."
                    v-model="filters.search"
                    class="md:w-auto w-full my-1"
                />
                <Dropdown
                    v-model="filters.room_type"
                    :options="[{ label: 'Signle ', value: 'signle' }]"
                    option-label="label"
                    option-value="value"
                    placeholder="Select room type"
                    class="md:ml-2 ml-0 md:w-auto w-full my-1"
                />
            </div>
            <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-1">
                <BookingCard v-for="i in 10" />
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { reactive } from "vue";
import BookingCard from "../../components/cards/BookingCard.vue";
import Dropdown from "primevue/dropdown";
import InputText from "primevue/inputtext";

const filters = reactive({
    search: null,
    room_type: null,
});
</script>
