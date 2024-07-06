<template>
	<div class="vs-block-card-tools">
		<v-menu v-model="menuModel" :close-on-content-click="false" bottom>
			<template v-slot:activator="{ props }">
				<div class="vs-icon-btn" v-bind="props">
					<IconSettings width="16" height="16" />
				</div>
			</template>

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

					<VsBlockCardToolsImages
						:label="`Превью`"
						:image="props.record?.acf.thumbnail"
						v-model="settingsForm.thumbnail"
						:deleteLoading="deleteLoading?.[ImageType.Thumbnail]"
						@lib-opened="openMediaLib(ImageType.Thumbnail)"
						@removed="remove(ImageType.Thumbnail)"
					/>

					<VsBlockCardToolsImages
						:label="`Полноразмерное изображение`"
						:image="props.record?.acf.imageFullSize"
						v-model="settingsForm.imageFullSize"
						:deleteLoading="deleteLoading?.[ImageType.ImageFullSize]"
						@lib-opened="openMediaLib(ImageType.ImageFullSize)"
						@removed="remove(ImageType.ImageFullSize)"
					/>

					<VsBlockCardToolsImages
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
						@closed="menuModel = false"
						@submitted="emit('submitted', settingsForm)"
					/>
				</div>
			</div>
		</v-menu>

		<div class="vs-icon-btn" @click.stop.prevent="emit('duplicated')">
			<IconCopy width="16" height="16" />
		</div>
		<div class="vs-icon-btn" @click.stop.prevent="emit('moved')">
			<IconArrowsMove width="16" height="16" />
		</div>
		<div class="vs-icon-btn" @click.stop.prevent="emit('hidden')">
			<IconEyeOff width="16" height="16" />
		</div>
	</div>
</template>

<script lang="ts" setup>
import IconCopy from '@/components/icons/IconCopy.vue'
import IconSettings from '@/components/icons/IconSettings.vue'
import IconArrowsMove from '@/components/icons/IconArrowsMove.vue'
import IconEyeOff from '@/components/icons/IconEyeOff.vue'
import AppTextField from '@/components/forms/app-textfield.vue'
import VsBlockCardToolsImages from './vs-block-card-tools-images.component.vue'
import AppFormButtons from '@/components/forms/app-form-buttons.component.vue'

import { onMounted, PropType, reactive, ref } from 'vue'
import { CommonCategoryParams, ImageType } from '@/models/terms'
import { Dimensions } from '@/models'

const props = defineProps({
	record: Object as PropType<Dimensions.DimensionTermState>,
	deleteLoading: Object as PropType<Record<ImageType, boolean>>,
})

const emit = defineEmits([
	'settings-opened',
	'duplicated',
	'moved',
	'hidden',
	'submitted',
	'load-media-requested',
	'removed',
])

const settingsForm = reactive({
	title: '',
	description: '',
	price: null,
	thumbnail: null,
	imageFullSize: null,
	childBlockImage: null,
} as CommonCategoryParams)

const menuModel = ref(false)

async function openMediaLib(imageType: ImageType) {
	emit('load-media-requested', imageType)
}

function remove(imageType: ImageType) {
	emit('removed', imageType)
}

onMounted(() => {
	settingsForm.title = props.record?.title ?? ''
	settingsForm.description = props.record?.description ?? ''
	settingsForm.price = props.record?.acf?.price
})
</script>

<style lang="scss" scoped>
.vs-block-tools-settings {
	min-width: 400px;
}
</style>