<template>
    <GuestLayout>
        <div v-if="room" class="py-8 website-width" style="max-width: 640px">
            <img
                :src="room.image"
                alt="Room"
                style="width: 100%; display: block"
            />
            <div class="mt-4">
                <div class="mb-2 font-medium text-xl">{{ room.name }}</div>
                <div class="mb-2">
                    {{ room.description }}
                </div>
                <div class="mb-2">
                    <RoomTypeState :label="room.type_text" :value="room.type" />
                    <RoomState
                        :label="room.status_text"
                        :value="room.status"
                        class="ml-1"
                    />
                </div>
                <div class="mb-2">
                    <div class="mt-0 font-semibold text-xl">
                        {{ room.price_text }}
                    </div>
                </div>
                <div>
                    <Button
                        type="button"
                        icon="pi pi-book"
                        label="Book"
                        :loading="bookingLoading"
                        @click="book"
                    />
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, onMounted } from "vue";
import Button from "primevue/button";
import RoomState from "../../components/states/RoomState.vue";
import RoomTypeState from "../../components/states/RoomTypeState.vue";
import ClientMainPageService from "../../services/client/ClientMainPageService";
import { useRoute, useRouter } from "vue-router";
import AuthHelper from "../../helpers/AuthHelper";
import ClientBookingService from "../../services/client/ClientBookingService";

const route = useRoute();
const router = useRouter();
const room = ref(null);
const bookingLoading = ref(false);

function book() {
    if (!AuthHelper.isAuthClient()) {
        router.push({ name: "client.login" });
        return;
    }

    bookingLoading.value = true;

    ClientBookingService.createBooking({ room_id: room.value.id }).finally(
        () => (bookingLoading.value = false)
    );
}

onMounted(() => {
    ClientMainPageService.getRoomData(route.params.room).then((data) => {
        room.value = data;
    });
});
</script>
