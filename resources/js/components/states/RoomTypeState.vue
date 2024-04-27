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
    case "single":
        severity.value = "success";
        break;
    case "double":
        severity.value = "warning";
        break;
    case "suite":
        severity.value = "info";
        break;
}
</script>
