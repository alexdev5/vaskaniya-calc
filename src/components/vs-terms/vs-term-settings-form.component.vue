<template>
	<div class="vs-block-tools-settings-container">
		<div class="vs-block-tools-settings">
			<AppTextField
				compact
				label="Тайтл"
				v-model="settingsForm.title"
			/>
			<AppTextField
				compact
				label="Цена"
				v-model="settingsForm.price"
			/>
			<!--        <AppTextarea
								compact
								label="Описание"
								v-model="settingsForm.description"
							/>-->

			<VsTermSettingsImage
				:label="`Превью`"
				:image="props.record?.acf.thumbnail"
				v-model="settingsForm.thumbnail"
				:deleteLoading="deleteLoading?.[ImageType.Thumbnail]"
				@lib-opened="openMediaLib(ImageType.Thumbnail)"
				@removed="remove(ImageType.Thumbnail)"
			/>

			<VsTermSettingsImage
				:label="`Полноразмерное изображение`"
				:image="props.record?.acf.imageFullSize"
				v-model="settingsForm.imageFullSize"
				:deleteLoading="deleteLoading?.[ImageType.ImageFullSize]"
				@lib-opened="openMediaLib(ImageType.ImageFullSize)"
				@removed="remove(ImageType.ImageFullSize)"
			/>

			<VsTermSettingsImage
				:label="`Изображение связанного блока`"
				:image="props.record?.acf.childBlockImage"
				v-model="settingsForm.childBlockImage"
				:deleteLoading="deleteLoading?.[ImageType.ChildBlockImage]"
				@lib-opened="openMediaLib(ImageType.ChildBlockImage)"
				@removed="remove(ImageType.ChildBlockImage)"
			/>

			<slot name="settings" />

			<AppFormButtons
				submit-only
				@closed="emit('closed')"
				@submitted="emit('submitted', settingsForm)"
			/>
		</div>
	</div>
</template>

<script lang="ts" setup>
import AppTextField from '@/components/forms/app-textfield.vue'
import AppFormButtons from '@/components/forms/app-form-buttons.component.vue'
import VsTermSettingsImage from './components/vs-term-settings-image.component.vue'

import { CommonCategoryParams, ImageType, TermState } from '@/models/terms'

import { onMounted, PropType, reactive } from 'vue'

const props = defineProps({
	record: Object as PropType<TermState>,
	deleteLoading: Object as PropType<Record<ImageType, boolean>>,
})

const emit = defineEmits([
	'submitted',
	'load-image-requested',
	'remove-image-requested',
	'closed',
])

const settingsForm = reactive({
	title: '',
	description: '',
	price: null,
	thumbnail: null,
	imageFullSize: null,
	childBlockImage: null,
} as CommonCategoryParams)

async function openMediaLib(imageType: ImageType) {
	emit('load-image-requested', imageType)
}

function remove(imageType: ImageType) {
	emit('remove-image-requested', imageType)
}

onMounted(() => {
	settingsForm.title = props.record?.title ?? ''
	settingsForm.description = props.record?.description ?? ''
	settingsForm.price = props.record?.acf?.price
})
</script>

<style lang="scss">

</style>