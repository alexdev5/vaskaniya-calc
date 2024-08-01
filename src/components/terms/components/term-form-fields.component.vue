<template>
	<div class="vs-block-tools-settings">
		<AppTextField
			compact
			:label="content.label.title"

			v-model="settingsForm.title"
		/>
		<AppTextField
			compact
			:label="content.label.price"
			v-model="settingsForm.price"
		/>
		<!--        <AppTextarea
							compact
							:label="content.label.description"
							v-model="settingsForm.description"
						/>-->

		<TermSettingsImage
			:label="content.label.preview"
			:image="props.record?.acf.thumbnail ?? undefined"
			v-model="settingsForm.thumbnail"
			:deleteLoading="deleteLoading?.[ImageType.Thumbnail]"
			:no-select-image="noSelectImage"
			@lib-opened="openMediaLib(ImageType.Thumbnail)"
			@removed="remove(ImageType.Thumbnail)"
		/>

		<TermSettingsImage
			:label="content.term.fullImage"
			:image="props.record?.acf.imageFullSize ?? undefined"
			v-model="settingsForm.imageFullSize"
			:deleteLoading="deleteLoading?.[ImageType.ImageFullSize]"
			:no-select-image="noSelectImage"
			@lib-opened="openMediaLib(ImageType.ImageFullSize)"
			@removed="remove(ImageType.ImageFullSize)"
		/>

		<TermSettingsImage
			:label="content.term.childImage"
			:image="props.record?.acf.childBlockImage ?? undefined"
			v-model="settingsForm.childBlockImage"
			:deleteLoading="deleteLoading?.[ImageType.ChildBlockImage]"
			:no-select-image="noSelectImage"
			@lib-opened="openMediaLib(ImageType.ChildBlockImage)"
			@removed="remove(ImageType.ChildBlockImage)"
		/>

		<slot name="settings" />
	</div>
</template>

<script lang="ts" setup>
import AppTextField from '@/components/forms/app-textfield.vue'
import TermSettingsImage from './term-settings-image.component.vue'

import { content } from '@/content'
import { ImageType, TermFromFields, TermState } from '@/models/terms'
import { onMounted, reactive, watch } from 'vue'

const props = defineProps<{
	record?: TermState,
	deleteLoading?: Record<ImageType, boolean>,
	noSelectImage?: boolean
}>()

const emit = defineEmits([
	'fields-updated',
	'load-image-requested',
	'remove-image-requested',
])

const settingsForm = reactive({
	title: '',
	description: '',
	price: null,
	thumbnail: null,
	imageFullSize: null,
	childBlockImage: null,
} as TermFromFields)

async function openMediaLib(imageType: ImageType) {
	emit('load-image-requested', imageType)
}

function remove(imageType: ImageType) {
	emit('remove-image-requested', imageType)
}

watch(
	settingsForm,
	() => {
		emit('fields-updated', settingsForm)
	}, { immediate: true })

onMounted(() => {
	settingsForm.title = props.record?.title ?? ''
	settingsForm.description = props.record?.description ?? ''
	settingsForm.price = props.record?.acf?.price
})
</script>

<style lang="scss">

</style>