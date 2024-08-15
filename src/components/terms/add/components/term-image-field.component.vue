<template>
	<div class="app-block-tools-settings-image">
		<p class="app-label">
			{{ label }}:
		</p>

		<div class="existing-image" v-if="preview && preview.name">
			<img :src="preview.url" alt="">
			<div class="existing-image-info">
				<ul class="app-list-standard small">
					<li>{{ preview.name }}</li>
					<li v-if="preview.date">{{ preview.date }}</li>
				</ul>

				<AppBtn
					icon
					x-small
					:loading="deleteLoading"
					@click="emit('removed')"
				>
					<IconTrash />
				</AppBtn>
			</div>
		</div>

		<div
			v-else
			class="app-block-tools-settings-image-actions"
			:class="{ 'loading-image-info': modelValue?.[0]?.name }"
		>
			<AppFileInput
				hide-input
				icon
				:model-value="modelValue"
				@update:model-value="emit('update:model-value', $event)"
			>
				<template #prepend-inner>
					<b v-if="modelValue?.[0]?.name">
						<small>
							{{ modelValue[0].name }}
						</small>
					</b>
					<AppBtn icon x-small v-else>
						<IconCameraPlus />
					</AppBtn>
				</template>
			</AppFileInput>

			<AppBtn
				v-if="!imageSelected"
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

import AppFileInput from '@/components/forms/app-fileinput.vue'
import IconCameraPlus from '@/components/icons/IconCameraPlus.vue'
import AppBtn from '@/components/elements/app-btn.component.vue'
import IconListSearch from '@/components/icons/IconListSearch.vue'
import IconTrash from '@/components/icons/IconTrash.vue'
import { ImageContract } from '@/api/terms'
import { onMounted, ref, watch } from 'vue'

interface ImagePreview {
	url: string
	name: string
	date: string
}

const props = defineProps<{
	label?: string,
	image?: ImageContract | File[],
	modelValue: any,
	deleteLoading?: boolean,
	imageSelected?: boolean
}>()

const emit = defineEmits(['update:model-value', 'lib-opened', 'removed'])

const imageSrc = ref('')

const preview = ref<ImagePreview>()

function setPreview() {
	if (!props.image) return {} as ImagePreview

	const result = {
		url: '',
		name: '',
		date: '',
	}

	if (imageSrc.value) URL.revokeObjectURL(imageSrc.value)

	if (props.image?.length) {
		const images = props.image as File[]
		const image = images[0]

		imageSrc.value = result.url = URL.createObjectURL(image)
		result.name = image.name
		result.date = `${image!.lastModifiedDate?.getDay()}.${image!.lastModifiedDate?.getMonth()}.${image!.lastModifiedDate?.getFullYear()}`
	} else {
		const image = props.image as ImageContract

		result.url = image.url
		result.name = image.fullName
		result.date = image.modified
	}
	return result as ImagePreview
}

watch(() => props.image, () => {
	preview.value = setPreview()
})

onMounted(() => {
	preview.value = setPreview()
})
</script>

<style lang="scss">

</style>