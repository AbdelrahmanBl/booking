<template>
    <div>
        <TabMenu :model="items" :active-index="activeIndex">
            <template #item="{ item, props }">
                <a
                    v-if="item.logout"
                    href="#"
                    v-bind="props.action"
                    @click="logout"
                >
                    <span v-bind="props.icon" />
                    <span v-bind="props.label">{{ item.label }}</span>
                </a>
                <router-link
                    v-else
                    v-slot="{ href, navigate }"
                    :to="item.route"
                    custom
                >
                    <a :href="href" v-bind="props.action" @click="navigate">
                        <span v-bind="props.icon" />
                        <span v-bind="props.label">{{ item.label }}</span>
                    </a>
                </router-link>
            </template>
        </TabMenu>
        <div class="p-5">
            <slot />
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import TabMenu from "primevue/tabmenu";
import { useRoute, useRouter } from "vue-router";
import AdminAuthService from "../../services/admin/AdminAuthService";

const route = useRoute();
const router = useRouter();
const activeIndex = ref(parseInt(localStorage.getItem("activeIndex")) ?? 0);

const items = ref([
    { label: "Home", icon: "pi pi-home", route: { name: "admin.home" } },
    {
        label: "Employees",
        icon: "pi pi-users",
        route: { name: "admin.employees" },
    },
    {
        label: "Rooms",
        icon: "pi pi-list",
        route: { name: "admin.rooms" },
    },
    { label: "Clients", icon: "pi pi-users", route: { name: "admin.clients" } },
    {
        label: "Bookings",
        icon: "pi pi-chart-line",
        route: { name: "admin.bookings" },
    },
    { label: "Logout", icon: "pi pi-sign-out", logout: true },
]);

onMounted(() => {
    items.value.forEach((item, index) => {
        if (!item?.logout && item.route.name === route.name) {
            activeIndex.value = index;
            localStorage.setItem("activeIndex", index);
        }
    });
});

const logout = () => {
    AdminAuthService.logout().then(() => router.push({ name: "admin.login" }));
};
</script>
