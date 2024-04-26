<template>
    <GuestLayout>
        <div>
            <img
                class="w-full h-[100vh]"
                src="http://localhost/booking.png"
                alt=""
            />
        </div>
        <div class="website-width py-6">
            <div class="text-center font-bold text-2xl">Book A Room Now</div>
            <div class="text-2xl text-red-600">Filter Area</div>
            <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-1">
                <BookingCard v-for="i in 10" />
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import BookingCard from "../../components/card/BookingCard.vue";
</script>
