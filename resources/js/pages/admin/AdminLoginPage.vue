<template>
    <AuthCard
        title="Login"
        description="You can login to your account from here."
    >
        <form @submit.prevent="login">
            <div class="grid py-2">
                <label class="mb-1" for="email">Email</label>
                <InputText id="email" type="text" v-model="form.email" />
            </div>
            <div class="grid py-2">
                <label class="mb-1" for="password">Password</label>
                <InputText
                    id="password"
                    type="password"
                    v-model="form.password"
                />
            </div>
            <div class="grid py-2">
                <Button type="submit" label="Login" :loading="loginLoading" />
            </div>
        </form>
    </AuthCard>
</template>

<script setup>
import { ref, reactive } from "vue";
import AuthCard from "../../components/cards/AuthCard.vue";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import AdminAuthService from "../../services/admin/AdminAuthService";
import { useRouter } from "vue-router";

const router = useRouter();

const loginLoading = ref(false);
const form = reactive({
    email: null,
    password: null,
});

const login = () => {
    loginLoading.value = true;
    AdminAuthService.login(form)
        .then(() => router.push({ name: "admin.home" }))
        .finally(() => (loginLoading.value = false));
};
</script>
