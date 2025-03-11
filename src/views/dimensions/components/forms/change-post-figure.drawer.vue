<template>
    <AppDrawer :opened="widgetOpened" @closed="close">
        <template #header>
            <div class="change-figure-drawer-header">
                <p v-for="titleItem in titlePrepared" :key="titleItem">
                    {{ titleItem }}
                </p>
            </div>
        </template>

        <div class="change-figure-drawer-body">
            <AppTextfield
                compact
                :label="content.dimensions.figure.form.btnLabel"
                v-model="figureFields.btnLabel"
            />
            <AppTextarea
                compact
                :label="content.dimensions.figure.form.description"
                v-model="figureFields.notification"
            />

            <TermImageField
                :label="content.common.label.selectImage"
                :image="selectedImage"
                @file-selected="selectImageToUpload"
                @lib-opened="mediaLibraryModal?.open()"
                @removed="removeFigureImage"
            />
        </div>

        <template #footer>
            <AppFormButtons
                :disabled="disabled"
                :loading="loading"
                @closed="close"
                @submitted="submit"
            />
        </template>
    </AppDrawer>

    <AppMediaModal
        ref="mediaLibraryModal"
        :callback="callback"
        @selected="selectFigure"
    />
</template>

<script lang="ts" setup>
import AppDrawer from '@/components/elements/app-drawer.component.vue'
import AppFormButtons from '@/components/forms/app-form-buttons.component.vue'
import TermImageField from '@/components/terms/add/components/term-image-field.component.vue'
import AppMediaModal from '@/components/media/app-media-modal.component.vue'
import AppTextarea from '@/components/forms/app-textarea.vue'
import AppTextfield from '@/components/forms/app-textfield.vue'

import { computed, ref } from 'vue'
import { content } from '@/content'
import { dimensionsApi, postApi } from '@/services'
import { usePostFigure } from '@/views/dimensions/components/forms/post-figure.composable.ts'
import { PostContracts, TermContracts } from '@/api'

const props = defineProps<{
    callback?: () => Promise<void>
}>()

const { figureFields, checkFigureFields, getBaseInputs } = usePostFigure()

const currentFigure = ref<PostContracts.PostContract>(
    {} as PostContracts.PostContract
)
const currentTaxonomy = ref()
const loading = ref(false)
const disabled = ref(false)
const widgetOpened = ref(false)
const passedTitle = ref()
const mediaLibraryModal = ref()

// Додаємо окремі змінні для файлу та об'єкта зображення
const selectedFile = ref<File | null>(null)
const selectedImage = ref<TermContracts.ImageContract | null>(null)

const titlePrepared = computed(() => {
    if (!passedTitle.value?.length) return []
    return passedTitle.value.split('\n')
})

// Обчислюване значення для прев'ю зображення
// const imagePreview = computed(() => {
//     if (selectedFile.value) {
//         return {
//             url: URL.createObjectURL(selectedFile.value),
//             name: selectedFile.value.name,
//         }
//     }
//     return selectedImage.value ?? null
// })

async function submit() {
    console.log('change post figure')
    return
    if (!checkFigureFields()) throw new Error('Check failed `FigurePost Form`')

    loading.value = true

    try {
        let postId

        if (currentFigure.value.id) {
            postId = await update()
        } else {
            postId = await create()
        }

        if (selectedFile.value) {
            await postApi.uploadImage(postId, selectedFile.value)
        } else if (
            selectedImage.value?.id !== currentFigure.value.thumbnail?.id
        ) {
            await postApi.assignImage(postId, selectedImage.value!.id)
        }

        if (props.callback) await props.callback()

        close()
    } catch (error: any) {
        console.log(error)
    } finally {
        loading.value = false
    }
}

function selectFigure(image: TermContracts.ImageContract) {
    selectedImage.value = image
    selectedFile.value = null
    mediaLibraryModal.value?.close()
}

function selectImageToUpload(file: File) {
    selectedFile.value = file
    selectedImage.value = null
}

function removeFigureImage() {
    selectedFile.value = null
    selectedImage.value = null
}

async function create() {
    if (!currentFigure.value.taxonomies.length)
        throw new Error('`taxonomies` empty')

    let inputs = getBaseInputs(currentFigure.value)

    return await dimensionsApi.createFigure({
        ...inputs,
        taxonomy: currentTaxonomy.value,
        taxonomies: currentFigure.value.taxonomies,
    })
}

async function update() {
    if (!currentFigure.value.id) throw new Error('`id` empty')

    let inputs = getBaseInputs(currentFigure.value)

    await dimensionsApi.updateFigure({
        ...inputs,
        id: currentFigure.value.id,
    })

    if (!selectedImage.value && currentFigure.value.thumbnail?.id) {
        await postApi.removeImage(currentFigure.value.id)
    }

    return currentFigure.value.id
}

async function open(
    figure: PostContracts.PostContract,
    title: string,
    taxonomy: string
) {
    currentFigure.value = figure
    selectedImage.value = figure.thumbnail
    selectedFile.value = null

    figure.acf?.btnLabel
        ? (figureFields.value.btnLabel = figure.acf.btnLabel)
        : (figureFields.value.btnLabel = '')

    figure.acf?.notification
        ? (figureFields.value.notification = figure.acf.notification)
        : (figureFields.value.notification = '')

    passedTitle.value = title
    currentTaxonomy.value = taxonomy
    widgetOpened.value = true
}

function close() {
    widgetOpened.value = false
    currentFigure.value = {} as PostContracts.PostContract
}

defineExpose({
    open,
    close,
})
</script>

<style lang="scss">
.change-figure-drawer-body {
    display: grid;
    gap: var(--app-offset-normal);

    .v-field__input {
        border-bottom: none !important;
    }
}
</style>
