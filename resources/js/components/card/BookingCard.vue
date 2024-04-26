<template>
    <router-link
        :to="{ path: 'room' }"
        class="border-1 surface-border border-round md:m-2 p-3 cursor-pointer reset lg:w-64 md:w-60 w-full"
        style="box-shadow: 0px 0px 3px #ddd"
    >
        <div class="mb-3">
            <div class="relative mx-auto">
                <img
                    :src="'https://primefaces.org/cdn/primevue/images/product/bamboo-watch.jpg'"
                    alt="Room"
                    class="w-full border-round"
                />
                <Tag
                    value="Available"
                    severity="success"
                    class="absolute"
                    style="left: 5px; top: 5px"
                />
            </div>
        </div>
        <div class="mb-1 font-medium">Room 1</div>
        <div class="mb-1">
            <Tag value="Signle" severity="info" class="p-1" />
        </div>
        <div class="flex justify-between items-center">
            <div class="mt-0 font-semibold text-xl">$200</div>
            <Button icon="pi pi-book" class="py-1" />
        </div>
    </router-link>
</template>

<script setup>
import Button from "primevue/button";
import Tag from "primevue/tag";
</script>
