<template>
    <Tag :value="props.label" :severity="severity" v-bind="$attrs" />
</template>

<script setup>
import { ref } from "vue";
import Tag from "primevue/tag";

const props = defineProps({
    label: String,
    value: String,
});

const severity = ref("");

switch (props.value) {
    case "approved":
        severity.value = "success";
        break;
    case "rejected":
        severity.value = "danger";
        break;
}
</script>
