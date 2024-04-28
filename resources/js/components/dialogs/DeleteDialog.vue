<template>
    <ConfirmDialog :group="group"></ConfirmDialog>
    <Button
        @click="handleConfirm"
        icon="pi pi-trash"
        severity="danger"
        :loading="loading"
    />
</template>

<script setup>
import { ref } from "vue";
import Button from "primevue/button";
import { useConfirm } from "primevue/useconfirm";
import ConfirmDialog from "primevue/confirmdialog";
import RequestHelper from "../../helpers/RequestHelper";

const emits = defineEmits(["destory"]);

const props = defineProps({
    id: Number,
    label: String,
    route: String,
});

const confirm = useConfirm();

const group = `deleteDialog-${props.id}`;

const loading = ref(false);

const handleConfirm = () => {
    confirm.require({
        group: group,
        message: `Do you want to delete '${props.label}'?`,
        header: "Danger Zone",
        icon: "pi pi-info-circle",
        rejectLabel: "Cancel",
        acceptLabel: "Delete",
        rejectClass: "p-button-secondary p-button-outlined",
        acceptClass: "p-button-danger",
        accept: () => {
            // handle delete record...
            loading.value = true;
            RequestHelper.destroy(props.route)
                .then(() => emits("destory"))
                .finally(() => (loading.value = false));
        },
    });
};
</script>
