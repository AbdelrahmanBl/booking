<template>
    <header class="bg-primary-500 py-5 px-8 text-white w-full text-center">
        <router-link :to="{ name: 'guest.main' }" class="reset px-2">
            Home
        </router-link>
        <router-link :to="{ name: 'client.home' }" class="reset px-2">
            My Bookings
        </router-link>
        <div @click="logout" class="px-2 cursor-pointer inline-block">
            Logout
        </div>
        <router-link :to="{ name: 'client.login' }" class="reset px-2">
            Login
        </router-link>
        <router-link :to="{ name: 'client.register' }" class="reset px-2">
            Register
        </router-link>
    </header>
    <section>
        <slot />
    </section>
    <footer v-if="!hideFooter" class="bg-black text-white p-4 text-center">
        All copyright reserved to booking ©️2024
    </footer>
</template>

<script setup>
defineProps({
    hideFooter: Boolean,
});

const logout = () => {
    alert("logout");
};
</script>
