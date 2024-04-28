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
                    placeholder="Enter room name"
                />
            </div>
            <div class="grid py-2">
                <label class="mb-1" for="description">Description</label>
                <Textarea
                    id="description"
                    type="text"
                    v-model="form.description"
                    rows="7"
                    placeholder="Enter room description"
                />
            </div>
            <div class="grid py-2">
                <label class="mb-1" for="type">Type</label>
                <Dropdown
                    v-model="form.type"
                    :options="roomTypeOptions"
                    option-label="label"
                    option-value="value"
                    placeholder="Select room type"
                />
            </div>
            <div class="grid py-2">
                <label class="mb-1" for="status">Status</label>
                <Dropdown
                    v-model="form.status"
                    :options="roomStatusOptions"
                    option-label="label"
                    option-value="value"
                    placeholder="Select room status"
                />
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
import Textarea from "primevue/textarea";
import Dropdown from "primevue/dropdown";
import AdminRoomService from "../../services/admin/AdminRoomService";

const emits = defineEmits(["create", "update"]);

const props = defineProps({
    model: Object,
    roomTypeOptions: Array,
    roomStatusOptions: Array,
});

const visible = ref(false);

const form = reactive({
    name: props.model?.name,
    description: props.model?.description,
    type: props.model?.type,
    status: props.model?.status,
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
        ? AdminRoomService.updateRecord(props.model.id, form).then((data) => {
              emits("update", data);
              visible.value = false;
          })
        : AdminRoomService.createRecord(form).then((data) => {
              emits("create", data);
              visible.value = false;
          });
};
</script>
