<template>
    <GuestLayout>
        <AuthCard
            title="Register"
            description="You can register a new account from here."
        >
            <form @submit.prevent="register">
                <div class="grid py-2">
                    <label class="mb-1" for="name">Name</label>
                    <InputText
                        id="name"
                        type="text"
                        placeholder="Enter your name"
                        v-model="form.name"
                    />
                </div>
                <div class="grid py-2">
                    <label class="mb-1" for="email">Email</label>
                    <InputText
                        id="email"
                        type="text"
                        placeholder="Enter your email"
                        v-model="form.email"
                    />
                </div>
                <div class="grid py-2">
                    <label class="mb-1" for="password">Password</label>
                    <InputText
                        id="password"
                        type="password"
                        placeholder="Enter your password"
                        v-model="form.password"
                    />
                </div>
                <div class="grid py-2">
                    <label class="mb-1" for="password_confirmation"
                        >Password Confirmation</label
                    >
                    <InputText
                        id="password_confirmation"
                        type="password"
                        placeholder="Enter your password confirmation"
                        v-model="form.password_confirmation"
                    />
                </div>
                <div class="grid py-2">
                    <Button
                        type="submit"
                        label="Register"
                        :loading="registerLoading"
                    />
                </div>
            </form>
        </AuthCard>
    </GuestLayout>
</template>

<script setup>
import { ref, reactive } from "vue";
import AuthCard from "../../components/cards/AuthCard.vue";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import ClientAuthService from "../../services/client/ClientAuthService";
import { useRouter } from "vue-router";

const registerLoading = ref(false);
const form = reactive({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const router = useRouter();

const register = () => {
    registerLoading.value = true;
    ClientAuthService.register(form)
        .then(() => router.push({ name: "client.login" }))
        .finally(() => (registerLoading.value = false));
};
</script>
