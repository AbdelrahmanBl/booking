<template>
    <GuestLayout>
        <div class="py-8 website-width" style="max-width: 640px">
            <Galleria
                :value="images"
                :numVisible="5"
                :showThumbnails="false"
                :showIndicators="true"
                containerClass="m-auto"
            >
                <template #item="slotProps">
                    <img
                        :src="slotProps.item.src"
                        alt="Room"
                        style="width: 100%; display: block"
                    />
                </template>
            </Galleria>
            <div>
                <div class="mb-2 font-medium text-xl">Room 1</div>
                <div class="mb-2">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui
                    distinctio minima mollitia, corrupti temporibus illum,
                    ratione iste ea provident perspiciatis nostrum veniam ad
                    ipsum dolores velit consequuntur libero, hic aperiam!
                </div>
                <div class="mb-2">
                    <RoomTypeState label="Single" value="single" />
                    <RoomState
                        label="Available"
                        value="available"
                        class="ml-1"
                    />
                </div>
                <div class="mb-2">
                    <div class="mt-0 font-semibold text-xl">$200</div>
                </div>
                <div>
                    <Button icon="pi pi-book" label="Book" />
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref } from "vue";
import Button from "primevue/button";
import Galleria from "primevue/galleria";
import RoomState from "../../components/states/RoomState.vue";
import RoomTypeState from "../../components/states/RoomTypeState.vue";

const images = ref([
    { src: location.origin + "/" + "booking.png" },
    { src: location.origin + "/" + "booking.png" },
    { src: location.origin + "/" + "booking.png" },
    { src: location.origin + "/" + "booking.png" },
]);
</script>
