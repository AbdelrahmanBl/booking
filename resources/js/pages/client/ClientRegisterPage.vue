<template>
    <GuestLayout>
        <AuthCard
            title="Register"
            description="You can register a new account from here."
        >
            <form @submit.prevent="register">
                <div class="grid py-2">
                    <label class="mb-1" for="name">Name</label>
                    <InputText id="name" type="text" v-model="form.name" />
                </div>
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
                    <label class="mb-1" for="password_confirmation"
                        >Password Confirmation</label
                    >
                    <InputText
                        id="password_confirmation"
                        type="password"
                        v-model="form.password_confirmation"
                    />
                </div>
                <div class="grid py-2">
                    <Button label="Register" :loading="true" />
                </div>
            </form>
        </AuthCard>
    </GuestLayout>
</template>

<script setup>
import { reactive } from "vue";
import AuthCard from "../../components/card/AuthCard.vue";
import InputText from "primevue/inputtext";
import Button from "primevue/button";

const form = reactive({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const register = () => {
    // ..
};
</script>
