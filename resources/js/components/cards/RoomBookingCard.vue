<template>
    <div
        class="border-1 surface-border border-round md:m-2 p-2 lg:w-64 md:w-60 w-full"
        style="box-shadow: 0px 0px 3px 2px #ddd"
    >
        <router-link
            :to="{ name: 'guest.rooms.show', params: { room: room.id } }"
            class="reset"
        >
            <div class="mb-3">
                <div class="relative mx-auto">
                    <img
                        :src="room.image"
                        alt="Room"
                        class="w-full border-round h-44"
                    />
                    <RoomState
                        :label="room.status_text"
                        :value="room.status"
                        class="absolute"
                        style="left: 5px; top: 5px"
                    />
                </div>
            </div>
            <div class="mb-1 font-medium">{{ room.name }}</div>
            <div class="mb-1">
                <RoomTypeState :label="room.type_text" :value="room.type" />
            </div>
        </router-link>
        <div class="flex justify-between items-center">
            <div class="mt-0 font-semibold text-xl">{{ room.price_text }}</div>
            <Button
                type="button"
                icon="pi pi-book"
                :loading="bookingLoading"
                @click="book"
            />
        </div>
    </div>
</template>

<script setup>
import Button from "primevue/button";
import RoomTypeState from "../states/RoomTypeState.vue";
import RoomState from "../states/RoomState.vue";
import AuthHelper from "../../helpers/AuthHelper";
import { useRouter } from "vue-router";
import ClientBookingService from "../../services/client/ClientBookingService";
import { ref } from "vue";

const props = defineProps({
    room: Object,
});

const router = useRouter();
const bookingLoading = ref(false);

function book() {
    if (!AuthHelper.isAuthClient()) {
        router.push({ name: "client.login" });
        return;
    }

    bookingLoading.value = true;

    ClientBookingService.createBooking({ room_id: props.room.id }).finally(
        () => (bookingLoading.value = false)
    );
}
</script>
