<template>
    <div
        class="border-1 surface-border border-round md:m-2 p-2 lg:w-64 md:w-60 w-full"
        style="box-shadow: 0px 0px 3px 2px #ddd"
    >
        <router-link
            :to="{ name: 'guest.rooms.show', params: { room: 1 } }"
            class="reset"
        >
            <div class="mb-3">
                <div class="relative mx-auto">
                    <img
                        :src="'https://primefaces.org/cdn/primevue/images/product/bamboo-watch.jpg'"
                        alt="Room"
                        class="w-full border-round"
                    />
                    <RoomState
                        label="Available"
                        value="available"
                        class="absolute"
                        style="left: 5px; top: 5px"
                    />
                </div>
            </div>
            <div class="mb-1 font-medium">Room 1</div>
            <div class="mb-1">
                <RoomTypeState label="Single" value="single" />
            </div>
        </router-link>
        <div class="flex justify-between items-center">
            <div class="mt-0 font-semibold text-xl">$200</div>
            <Button icon="pi pi-book" />
        </div>
    </div>
</template>

<script setup>
import Button from "primevue/button";
import RoomTypeState from "../states/RoomTypeState.vue";
import RoomState from "../states/RoomState.vue";
</script>
