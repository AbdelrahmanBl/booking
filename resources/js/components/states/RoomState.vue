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
        case "available":
            return (severity.value = "success");
        case "booked":
            return (severity.value = "danger");
        case "pending":
            return (severity.value = "warning");
    }
});
</script>
