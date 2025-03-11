<template>
    <AppDrawer
        :opened="widgetOpened"
        @closed="close"
        :title="params?.title ?? ''"
    >
        <div class="app-block-tools-settings" v-if="widgetOpened">
            <AppTextField
                :label="content.common.label.slug"
                v-model="values.slug"
                compact
            />
            <AppTextField
                :label="content.common.label.name"
                v-model="values.name"
                compact
            />
            <AppTextField
                compact
                :label="content.common.label.title"
                v-model="values.title"
            />

            <AppTextField
                compact
                :label="content.common.label.price"
                v-model="values.price"
            />

            <TermImageField
                :label="content.common.label.preview"
                :image="values.thumbnail"
                @file-selected="
                    selectImageToUpload($event, ImageType.Thumbnail)
                "
                @lib-opened="mediaModal.open(ImageType.Thumbnail)"
                @removed="removeImage(ImageType.Thumbnail)"
            />

            <TermImageField
                :label="content.common.label.previewActive"
                :image="values.thumbnailActive"
                @file-selected="
                    selectImageToUpload($event, ImageType.ThumbnailActive)
                "
                @lib-opened="mediaModal.open(ImageType.ThumbnailActive)"
                @removed="removeImage(ImageType.ThumbnailActive)"
            />

            <TermImageField
                :label="content.common.term.fullImage"
                :image="values.imageFullSize"
                @file-selected="
                    selectImageToUpload($event, ImageType.ImageFullSize)
                "
                @lib-opened="mediaModal.open(ImageType.ImageFullSize)"
                @removed="removeImage(ImageType.ImageFullSize)"
            />

            <TermImageField
                :label="content.common.term.childImage"
                :image="values.childBlockImage"
                @file-selected="
                    selectImageToUpload($event, ImageType.ChildBlockImage)
                "
                @lib-opened="mediaModal.open(ImageType.ChildBlockImage)"
                @removed="removeImage(ImageType.ChildBlockImage)"
            />

            <slot name="settings" />
        </div>

        <template #footer>
            <AppFormButtons
                :disabled="disabled"
                :loading="loading"
                @closed="close()"
                @submitted="submit"
            />
        </template>
    </AppDrawer>

    <AppMediaModal
        ref="mediaModal"
        :callback="callback"
        @selected="prepareAssignmentImage"
    />
</template>

<script lang="ts" setup>
import AppDrawer from '@/components/elements/app-drawer.component.vue'
import AppFormButtons from '@/components/forms/app-form-buttons.component.vue'
import TermImageField from '@/components/terms/add/components/term-image-field.component.vue'
import AppTextField from '@/components/forms/app-textfield.vue'
import AppMediaModal from '@/components/media/app-media-modal.component.vue'

import { computed, reactive, ref } from 'vue'
import {
    CreateTermInDrawerParams,
    ImageType,
    TermFromFields,
} from '@/models/terms'
import { termsApi } from '@/services'
import { content } from '@/content'
import { TermContracts } from '@/api'
import { ImageContract } from '@/api/terms/term.contracts.ts'

const props = defineProps<{
    callback?: () => Promise<void>
}>()

const emit = defineEmits(['fields-updated', 'assign-image-requested'])
const mediaModal = ref()

const params = ref<CreateTermInDrawerParams | null>(null)
const loading = ref(false)
const disabled = ref(false)
const widgetOpened = ref(false)

const imagesToUpload = reactive({
    thumbnail: null as File | null,
    thumbnailActive: null as File | null,
    imageFullSize: null as File | null,
    childBlockImage: null as File | null,
})

const values = reactive({
    id: 0,
    slug: '',
    title: '',
    name: '',
    description: '',
    price: null,
    thumbnail: null as ImageContract | null,
    thumbnailActive: null as ImageContract | null,
    imageFullSize: null as ImageContract | null,
    childBlockImage: null as ImageContract | null,
} as TermFromFields)

const isImageFromLibrary = computed(
    () =>
        values.imageFullSize?.length ||
        values.thumbnailActive?.length ||
        values.thumbnail?.length ||
        values.childBlockImage?.length
)
const isImageToUpload = computed(
    () =>
        imagesToUpload.imageFullSize ||
        imagesToUpload.thumbnailActive ||
        imagesToUpload.thumbnail ||
        imagesToUpload.childBlockImage
)

async function submit() {
    if (!values.name) throw new Error("'name' in values is empty")
    if (!params.value || !params.value?.taxonomy)
        throw new Error('params is not passed in add-term-form-drawer')

    loading.value = true

    try {
        const termId = await termsApi.create({
            parentId: params.value?.parentId,
            taxonomy: params.value!.taxonomy,
            title: values.title,
            name: values.name,
            description: values.description,
            price: values.price,
        })

        if (isImageFromLibrary.value) {
            await termsApi.assignImages({
                termId,
                imageFullSizeId: values.imageFullSize?.id ?? null,
                thumbnailId: values.thumbnail?.id ?? null,
                thumbnailActiveId: values.thumbnailActive?.id ?? null,
                childBlockImageId: values.childBlockImage?.id ?? null,
            })
        }

        if (isImageToUpload.value) {
            await termsApi.addImages({
                termId,
                imageFullSize: imagesToUpload.imageFullSize ?? null,
                thumbnail: imagesToUpload.thumbnail ?? null,
                thumbnailActive: imagesToUpload.thumbnailActive ?? null,
                childBlockImage: imagesToUpload.childBlockImage ?? null,
            })
        }

        if (props.callback) await props.callback()

        console.log(content.common.notifications.updated)

        close()
    } catch (error: any) {
        console.log(error)
    } finally {
        loading.value = false
    }
}

async function open(_params: CreateTermInDrawerParams) {
    params.value = _params
    widgetOpened.value = true
}

function close() {
    widgetOpened.value = false
    params.value = null
    //values = null
}

function selectImageToUpload(file: File, imageType: ImageType) {
    switch (imageType) {
        case ImageType.Thumbnail:
            imagesToUpload.thumbnail = file
            break
        case ImageType.ImageFullSize:
            imagesToUpload.imageFullSize = file
            break
        case ImageType.ChildBlockImage:
            imagesToUpload.childBlockImage = file
            break
        case ImageType.ThumbnailActive:
            imagesToUpload.thumbnailActive = file
            break
    }
}

function prepareAssignmentImage(image: TermContracts.ImageContract) {
    if (!image.type) {
        console.error('image.type is empty: ', image)
        return
    }

    switch (image.type) {
        case ImageType.Thumbnail:
            values.thumbnail = image
            break
        case ImageType.ImageFullSize:
            values.imageFullSize = image
            break
        case ImageType.ChildBlockImage:
            values.childBlockImage = image
            break
        case ImageType.ThumbnailActive:
            values.thumbnailActive = image
            break
    }

    mediaModal.value.close()
}

function removeImage(imageType: ImageType) {
    console.log(imageType)
    switch (imageType) {
        case ImageType.Thumbnail:
            values.thumbnail = null
            imagesToUpload.thumbnail = null
            break
        case ImageType.ImageFullSize:
            values.imageFullSize = null
            imagesToUpload.imageFullSize = null
            break
        case ImageType.ChildBlockImage:
            values.childBlockImage = null
            imagesToUpload.childBlockImage = null
            break
        case ImageType.ThumbnailActive:
            values.thumbnailActive = null
            imagesToUpload.thumbnailActive = null
            break
    }
}

defineExpose({
    open,
    close,
})
</script>

<style lang="scss"></style>
