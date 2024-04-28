<template>
    <Tag :value="props.label" :severity="severity" v-bind="$attrs" />
</template>

<script setup>
import { computed } from "vue";
import Tag from "primevue/tag";

const props = defineProps({
    label: String,
    value: String,
});

const severity = computed(() => {
    switch (props.value) {
        case "pending":
            return (severity.value = "warning");
        case "approved":
            return (severity.value = "success");
        case "rejected":
            return (severity.value = "danger");
    }
});
</script>
