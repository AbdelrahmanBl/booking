<template>
    <Toast />
    <router-view></router-view>
</template>

<script>
import Toast from "primevue/toast";

export default {
    components: {
        Toast,
    },
    mounted() {
        window.displayMessage = (message = "success") => {
            this.$toast.add({
                severity: "success",
                summary: "Message",
                detail: message,
                life: 3000,
            });
        };
        window.displayError = (message = "error") => {
            this.$toast.add({
                severity: "error",
                summary: "Error Message",
                detail: message,
                life: 3000,
            });
        };
    },
};
</script>
