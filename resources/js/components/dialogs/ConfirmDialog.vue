<template>
    <ConfirmDialog :group="group"></ConfirmDialog>
    <Button
        @click="handleConfirm"
        :icon="buttonIcon"
        :severity="buttonSeverity"
        :loading="loading"
    />
</template>

<script setup>
import { ref, computed } from "vue";
import Button from "primevue/button";
import { useConfirm } from "primevue/useconfirm";
import ConfirmDialog from "primevue/confirmdialog";
import AdminBookingService from "../../services/admin/AdminBookingService";

const emits = defineEmits(["update"]);

const props = defineProps({
    id: Number,
    label: String,
    type: {
        type: String,
        validate: (value) => value.include(["approve", "reject"]),
    },
});

const confirm = useConfirm();

const group = `${props.type}Dialog-${props.id}`;

const loading = ref(false);

const buttonIcon = computed(() =>
    props.type === "approve" ? "pi pi-check" : "pi pi-times"
);
const buttonSeverity = computed(() =>
    props.type === "approve" ? "success" : "danger"
);

const handleConfirm = () => {
    confirm.require({
        group: group,
        message: `Do you want to ${props.type} '${props.label}'?`,
        header: "Confirm Zone",
        icon: "pi pi-info-circle",
        rejectLabel: "cancel",
        acceptLabel: props.type,
        rejectClass: "p-button-secondary p-button-outlined",
        acceptClass: `p-button-${buttonSeverity.value}`,
        accept: () => {
            // handle confirm record...
            loading.value = true;
            AdminBookingService.updateRecord(props.id, {
                status: props.type === "approve" ? "approved" : "rejected",
            })
                .then((data) => {
                    emits("update", data);
                })
                .finally(() => (loading.value = false));
        },
    });
};
</script>
