<template>
    <div class="app-block-tools-settings-image">
        <p class="app-label">{{ label }}:</p>

        <!-- Відображення існуючого зображення -->
        <div class="existing-image" v-if="!selectedFile && image">
            <img :src="image.url" alt="" />
            <div class="existing-image-info">
                <ul class="app-list-standard small">
                    <li>{{ image.fullName }}</li>
                    <li v-if="image.modified">{{ image.modified }}</li>
                </ul>

                <AppBtn
                    icon
                    x-small
                    :loading="deleteLoading"
                    @click="removeSelectedFile"
                >
                    <IconTrash />
                </AppBtn>
            </div>
        </div>

        <!-- Відображення попереднього перегляду обраного файлу -->
        <div class="existing-image" v-else-if="selectedFile">
            <img :src="selectedFile.previewUrl" alt="" />
            <div class="existing-image-info">
                <ul class="app-list-standard small">
                    <li>{{ selectedFile.name }}</li>
                    <li>{{ selectedFile.date }}</li>
                </ul>

                <AppBtn icon x-small @click="removeSelectedFile">
                    <IconTrash />
                </AppBtn>
            </div>
        </div>

        <!-- Кнопки вибору файлу або відкриття бібліотеки -->
        <div v-else class="app-block-tools-settings-image-actions">
            <AppFileInput
                hide-input
                icon
                @update:model-value="handleFileSelected"
            >
                <template #prepend-inner>
                    <AppBtn icon x-small>
                        <IconCameraPlus />
                    </AppBtn>
                </template>
            </AppFileInput>

            <AppBtn
                v-if="!selectedFile"
                icon
                x-small
                @click="emit('lib-opened')"
            >
                <IconListSearch />
            </AppBtn>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue'
import AppFileInput from '@/components/forms/app-fileinput.vue'
import AppBtn from '@/components/elements/app-btn.component.vue'
import IconCameraPlus from '@/components/icons/IconCameraPlus.vue'
import IconListSearch from '@/components/icons/IconListSearch.vue'
import IconTrash from '@/components/icons/IconTrash.vue'
import { ImageContract } from '@/api/terms/term.contracts.ts'

defineProps<{
    label?: string
    image?: ImageContract | null
    deleteLoading?: boolean
}>()

const emit = defineEmits(['removed', 'lib-opened', 'file-selected'])

// Обраний файл
const selectedFile = ref<{
    file: File
    previewUrl: string
    name: string
    date: string
} | null>(null)

function handleFileSelected(files: File[]) {
    if (!files.length) return

    const file = files[0]
    const previewUrl = URL.createObjectURL(file)
    const date = new Date(file.lastModified).toLocaleDateString()

    selectedFile.value = { file, previewUrl, name: file.name, date }

    emit('file-selected', file)
}

// Видалення вибраного файлу
function removeSelectedFile() {
    if (selectedFile.value?.previewUrl) {
        URL.revokeObjectURL(selectedFile.value.previewUrl)
    }
    selectedFile.value = null

    emit('removed')
}
</script>

<style lang="scss"></style>
