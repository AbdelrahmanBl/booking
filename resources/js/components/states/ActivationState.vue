<template>
    <Tag :value="label" :severity="severity" v-bind="$attrs" />
</template>

<script setup>
import { computed } from "vue";
import Tag from "primevue/tag";

const props = defineProps({
    value: Boolean,
});

const label = computed(() => {
    switch (props.value) {
        case true:
            return (label.value = "Active");
        case false:
            return (label.value = "Not Active");
    }
});

const severity = computed(() => {
    switch (props.value) {
        case true:
            return (severity.value = "success");
        case false:
            return (severity.value = "danger");
    }
});
</script>
