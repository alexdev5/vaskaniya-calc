<template>
    <v-dialog
        class="app-modal"
        :max-width="maxWidth"
        v-model="opened"
        @update:model-value="changeModal"
    >
        <div v-if="hasSlot('header-fixed')" class="app-modal-header-fixed">
            <slot name="header-fixed" />
        </div>
        <v-card :title="title">
            <slot />

            <v-card-actions v-if="hasSlot('actions')" class="app-modal-footer">
                <slot name="actions" />
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script lang="ts" setup>
import { ref, useSlots } from 'vue'

defineProps({
    title: {
        type: [String, Number],
        default: '',
    },
    maxWidth: {
        type: [String, Number],
        default: 1200,
    },
})

const emit = defineEmits(['opened', 'closed'])

const opened = ref(false)

const slots = useSlots()
const hasSlot = (name: string) => Boolean(slots[name])

function open() {
    opened.value = true
}

function close() {
    opened.value = false
}

function changeModal(flag: boolean) {
    flag ? emit('opened') : emit('closed')
}

defineExpose({
    open,
    close,
})
</script>

<style lang="scss"></style>