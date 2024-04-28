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
                    placeholder="Enter client name"
                />
            </div>
            <div class="grid py-2">
                <label class="mb-1" for="email">Email</label>
                <InputText
                    id="email"
                    type="text"
                    v-model="form.email"
                    placeholder="Enter client email"
                />
            </div>
            <div class="grid py-2">
                <label class="mb-1" for="password">Password</label>
                <InputText
                    id="password"
                    type="password"
                    v-model="form.password"
                    placeholder="Enter client password"
                />
            </div>
            <div class="grid py-2">
                <label class="mb-1" for="password_confirmation">
                    Password Confirmation
                </label>
                <InputText
                    id="password_confirmation"
                    type="password"
                    v-model="form.password_confirmation"
                    placeholder="Enter client password_confirmation"
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
import AdminClientService from "../../services/admin/AdminClientService";

const emits = defineEmits(["create", "update"]);

const props = defineProps({
    model: Object,
});

const visible = ref(false);

const form = reactive({
    name: props.model?.name,
    email: props.model?.email,
    password: null,
    password_confirmation: null,
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
    isEdit.value
        ? AdminClientService.updateRecord(props.model.id, form).then((data) => {
              form.password = null;
              form.password_confirmation = null;
              emits("update", data);
              visible.value = false;
          })
        : AdminClientService.createRecord(form).then((data) => {
              emits("create", data);
              visible.value = false;
          });
};
</script>
