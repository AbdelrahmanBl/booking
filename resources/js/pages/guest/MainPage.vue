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
                    v-model="filters.type"
                    :options="roomTypeOptions"
                    option-label="label"
                    option-value="value"
                    placeholder="Select room type"
                    class="md:ml-2 ml-0 md:w-auto w-full my-1"
                    showClear
                />
            </div>
            <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-1 gap-2">
                <RoomBookingCard
                    v-for="room in rooms"
                    :key="room.id"
                    :room="room"
                />
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, reactive, onMounted, watch } from "vue";
import RoomBookingCard from "../../components/cards/RoomBookingCard.vue";
import Dropdown from "primevue/dropdown";
import InputText from "primevue/inputtext";
import ClientMainPageService from "../../services/client/ClientMainPageService";
import debounce from "lodash/debounce";

const filters = reactive({
    search: null,
    type: null,
});

const rooms = ref([]);
const roomTypeOptions = ref([]);

onMounted(() => loadRooms());

watch(
    filters,
    debounce(() => loadRooms(), 1000)
);

function loadRooms() {
    ClientMainPageService.getPageData(filters).then((data) => {
        roomTypeOptions.value = data.roomTypeOptions;
        rooms.value = data.rooms;
    });
}
</script>
