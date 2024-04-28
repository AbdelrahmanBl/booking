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
            return "Active";
        case false:
            return "Not Active";
    }
});

const severity = computed(() => {
    switch (props.value) {
        case true:
            return "success";
        case false:
            return "danger";
    }
});
</script>
