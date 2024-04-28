<template>
    <AdminLayout>
        <div>Welcome {{ auth.name }},</div>
        <div class="mt-2">
            Your Type Is
            <EmployeeTypeState :label="auth.type_text" :value="auth.type" />
        </div>
    </AdminLayout>
</template>

<script setup>
import { computed } from "vue";
import AuthHelper from "../../helpers/AuthHelper";
import EmployeeTypeState from "../../components/states/EmployeeTypeState.vue";

const auth = computed(() => AuthHelper.getAuthUser());
</script>
