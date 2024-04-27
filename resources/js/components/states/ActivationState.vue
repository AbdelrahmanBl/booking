<template>
    <Tag :value="label" :severity="severity" v-bind="$attrs" />
</template>

<script setup>
import { ref } from "vue";
import Tag from "primevue/tag";

const props = defineProps({
    value: Boolean,
});

const severity = ref("");
const label = ref("");

switch (props.value) {
    case true:
        severity.value = "success";
        label.value = "Active";
        break;
    case false:
        severity.value = "danger";
        label.value = "Not Active";
        break;
}
</script>
