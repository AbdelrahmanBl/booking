<template>
    <div class="grid md:grid-cols-2 grid-cols-1 m-auto md:h-[100vh]">
        <div>
            <img
                class="w-full h-full"
                :src="asset('booking.webp')"
                alt="booking"
            />
        </div>
        <div class="flex justify-center m-auto">
            <div class="md:mt-0 mt-8">
                <div class="text-2xl font-bold py-1">{{ title }}</div>
                <div class="text-base text-slate-700 py-1">
                    {{ description }}
                </div>
                <div class="py-4">
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    title: String,
    description: String,
});
</script>
