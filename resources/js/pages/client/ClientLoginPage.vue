<template>
    <GuestLayout>
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
                    <Button label="Login" :loading="true" />
                </div>
            </form>
        </AuthCard>
    </GuestLayout>
</template>

<script setup>
import { reactive } from "vue";
import AuthCard from "../../components/cards/AuthCard.vue";
import InputText from "primevue/inputtext";
import Button from "primevue/button";

const form = reactive({
    email: null,
    password: null,
});

const login = () => {
    // ...
};
</script>
