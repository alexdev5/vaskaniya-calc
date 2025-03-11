<template>
    <AppDrawer
        :opened="widgetOpened"
        @closed="close"
        :title="params?.title ?? ''"
    >
        <div class="app-block-tools-settings" v-if="widgetOpened">
            <AppTextField
                :label="content.common.label.name"
                v-model="values.name"
                compact
            />
            <AppTextField
                :label="content.common.label.slug"
                v-model="values.slug"
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
                v-model="values.thumbnail"
                @lib-opened="mediaModal.open(ImageType.Thumbnail)"
            />

            <TermImageField
                :label="content.common.label.previewActive"
                v-model="values.thumbnailActive"
                @lib-opened="mediaModal.open(ImageType.ThumbnailActive)"
            />

            <TermImageField
                :label="content.common.term.fullImage"
                v-model="values.imageFullSize"
                @lib-opened="mediaModal.open(ImageType.ImageFullSize)"
            />

            <TermImageField
                :label="content.common.term.childImage"
                v-model="values.childBlockImage"
                @lib-opened="mediaModal.open(ImageType.ChildBlockImage)"
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

import { reactive, ref } from 'vue'
import {
    CreateTermInDrawerParams,
    ImageType,
    TermFromFields,
} from '@/models/terms'
import { termsApi } from '@/services'
import { content } from '@/content'
import { TermContracts } from '@/api'

const props = defineProps<{
    callback?: () => Promise<void>
}>()

const emit = defineEmits(['fields-updated', 'assign-image-requested'])
const mediaModal = ref()

const params = ref<CreateTermInDrawerParams | null>(null)
const loading = ref(false)
const disabled = ref(false)
const widgetOpened = ref(false)

const values = reactive({
    id: 0,
    slug: '',
    title: '',
    name: '',
    description: '',
    price: null,
    thumbnail: null,
    thumbnailActive: null,
    imageFullSize: null,
    childBlockImage: null,
} as TermFromFields)

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

        if (
            values.imageFullSize?.length ||
            values.thumbnailActive?.length ||
            values.thumbnail?.length ||
            values.childBlockImage?.length
        ) {
            await termsApi.addImages({
                termId,
                imageFullSize: values.imageFullSize?.[0] ?? null,
                thumbnail: values.thumbnail?.[0] ?? null,
                thumbnailActive: values.thumbnailActive?.[0] ?? null,
                childBlockImage: values.childBlockImage?.[0] ?? null,
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
}

defineExpose({
    open,
    close,
})
</script>

<style lang="scss"></style>
