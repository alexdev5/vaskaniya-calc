<template>
    <div class="app-block-tools-settings">
        <AppTextField
            v-if="settingsForm.id"
            :label="content.common.label.id"
            v-model="settingsForm.id"
            compact
            disabled
        />
        <AppTextField
            :label="content.common.label.name"
            v-model="settingsForm.name"
            compact
            :disabled="Boolean(settingsForm.name)"
        />
        <AppTextField
            v-if="settingsForm.slug"
            :label="content.common.label.slug"
            v-model="settingsForm.slug"
            compact
        />

        <AppTextField
            compact
            :label="content.common.label.title"
            v-model="settingsForm.title"
        />

        <AppTextField
            compact
            :label="content.common.label.price"
            v-model="settingsForm.price"
        />

        <TermImageField
            :label="content.common.label.preview"
            :image="settingsForm.thumbnail"
            :deleteLoading="deleteLoading?.[ImageType.Thumbnail]"
            @file-selected="selectImageToUpload($event, ImageType.Thumbnail)"
            @lib-opened="openMediaLib(ImageType.Thumbnail)"
            @removed="remove(ImageType.Thumbnail)"
        />

        <TermImageField
            :label="content.common.label.previewActive"
            :image="settingsForm.thumbnailActive"
            :deleteLoading="deleteLoading?.[ImageType.ThumbnailActive]"
            @file-selected="
                selectImageToUpload($event, ImageType.ThumbnailActive)
            "
            @lib-opened="openMediaLib(ImageType.ThumbnailActive)"
            @removed="remove(ImageType.ThumbnailActive)"
        />

        <TermImageField
            :label="content.common.term.fullImage"
            :image="settingsForm.imageFullSize"
            :deleteLoading="deleteLoading?.[ImageType.ImageFullSize]"
            @file-selected="
                selectImageToUpload($event, ImageType.ImageFullSize)
            "
            @lib-opened="openMediaLib(ImageType.ImageFullSize)"
            @removed="remove(ImageType.ImageFullSize)"
        />

        <TermImageField
            :label="content.common.term.childImage"
            :image="settingsForm.childBlockImage"
            :deleteLoading="deleteLoading?.[ImageType.ChildBlockImage]"
            @file-selected="
                selectImageToUpload($event, ImageType.ChildBlockImage)
            "
            @lib-opened="openMediaLib(ImageType.ChildBlockImage)"
            @removed="remove(ImageType.ChildBlockImage)"
        />

        <slot name="settings" />
    </div>
</template>

<script lang="ts" setup>
import AppTextField from '@/components/forms/app-textfield.vue'
import TermImageField from '@/components/terms/add/components/term-image-field.component.vue'

import { content } from '@/content'
import { ImageType, TermFromFields, TermState } from '@/models/terms'
import { onMounted, reactive, watch } from 'vue'
import { ImageContract } from '@/api/terms/term.contracts.ts'

const props = defineProps<{
    record?: TermState
    deleteLoading?: Record<ImageType, boolean>
}>()

const emit = defineEmits([
    'fields-updated',
    'load-image-requested',
    'remove-image-requested',
    'file-selected',
])

const settingsForm = reactive({
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

async function openMediaLib(imageType: ImageType) {
    emit('load-image-requested', imageType)
}

function remove(imageType: ImageType) {
    emit('remove-image-requested', imageType)
}

function selectImageToUpload(file: File, imageType: ImageType) {
    emit('file-selected', file, imageType)
}

watch(
    settingsForm,
    () => {
        emit('fields-updated', settingsForm)
    },
    { immediate: true }
)

onMounted(() => {
    settingsForm.id = props.record?.id ?? 0
    settingsForm.slug = props.record?.slug ?? ''
    settingsForm.name = props.record?.acf?.name ?? ''
    settingsForm.title = props.record?.title ?? ''
    settingsForm.description = props.record?.description ?? ''
    settingsForm.price = props.record?.acf?.price ?? null

    settingsForm.thumbnail = props.record?.acf?.thumbnail ?? null
    settingsForm.thumbnailActive = props.record?.acf?.thumbnailActive ?? null
    settingsForm.imageFullSize = props.record?.acf?.imageFullSize ?? null
    settingsForm.childBlockImage = props.record?.acf?.childBlockImage ?? null
})
</script>

<style lang="scss"></style>
