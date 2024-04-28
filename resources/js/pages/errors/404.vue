<template>
    <div
        class="absolute w-full h-full flex justify-center items-center bg-slate-900"
    >
        <div class="text-white font-bold text-center p-1">
            <div class="text-2xl">Error 404</div>
            <div class="text-xl">Page Not Found</div>
            <div class="text-base mt-4 text-primary-600">
                <router-link class="reset" :to="{ name: 'guest.main' }">
                    <span class="pi pi-home mx-2"></span> Go To Home
                </router-link>
            </div>
        </div>
    </div>
</template>
