<template>
    <Button :label="buttonLabel" :icon="buttonIcon" @click="visible = true" />

    <Dialog
        v-model:visible="visible"
        modal
        :header="dialogHeader"
        :style="{ width: '25rem' }"
    >
        <form @submit.prevent="submit">
            <div class="grid py-2">
                <label class="mb-1" for="name">Name</label>
                <InputText
                    id="name"
                    type="text"
                    v-model="form.name"
                    placeholder="Enter employee name"
                />
            </div>
            <div class="grid py-2">
                <label class="mb-1" for="email">Email</label>
                <InputText
                    id="email"
                    type="text"
                    v-model="form.email"
                    placeholder="Enter employee email"
                />
            </div>
            <div class="grid py-2">
                <label class="mb-1" for="type">Type</label>
                <Dropdown
                    v-model="form.type"
                    :options="employeeTypeOptions"
                    option-label="label"
                    option-value="value"
                    placeholder="Select employee type"
                />
            </div>
            <div class="grid py-2">
                <label class="mb-1" for="status">Activation</label>
                <InputSwitch v-model="form.is_active" />
            </div>
            <div class="flex justify-content-end gap-2">
                <Button
                    type="button"
                    label="Cancel"
                    severity="secondary"
                    @click="visible = false"
                ></Button>
                <Button type="submit" label="Save"></Button>
            </div>
        </form>
    </Dialog>
</template>

<script setup>
import { ref, reactive, computed } from "vue";
import Dialog from "primevue/dialog";
import Button from "primevue/button";
import InputText from "primevue/inputtext";
import InputSwitch from "primevue/inputswitch";
import Dropdown from "primevue/dropdown";

const props = defineProps({
    model: Object,
    employeeTypeOptions: Array,
});

const visible = ref(false);

const form = reactive({
    name: props.model?.name,
    email: props.model?.email,
    type: props.model?.type,
    is_active: props.model ? props.model.is_active : true,
});

const isEdit = computed(() => !!props.model);
const buttonLabel = computed(() => (isEdit.value ? "" : "Add new"));
const buttonIcon = computed(() =>
    isEdit.value ? "pi pi-pen-to-square" : "pi pi-plus"
);
const dialogHeader = computed(() =>
    isEdit.value ? `Edit - ${props.model.name}` : "Add new"
);

const submit = () => {
    // ...
    visible.value = false;
};
</script>
