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
						:buttonLibLoading="false"
						@lib-opened="openMediaLib(ImageType.Thumbnail)"
					/>

					<VsBlockCardToolsImages
						:label="`Полноразмерное изображение`"
						:image="props.record?.acf.imageFullSize"
						v-model="settingsForm.imageFullSize"
						:buttonLibLoading="false"
						@lib-opened="openMediaLib(ImageType.ImageFullSize)"
					/>

					<VsBlockCardToolsImages
						:label="`Изображение связанного блока`"
						:image="props.record?.acf.relatedImage"
						v-model="settingsForm.relatedImage"
						:buttonLibLoading="false"
						@lib-opened="openMediaLib(ImageType.RelatedImage)"
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

    <div class="vs-icon-btn" @click.stop.prevent="emit('copied')">
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
import IconCameraPlus from '@/components/icons/IconCameraPlus.vue'
import IconListSearch from '@/components/icons/IconListSearch.vue'
import AppTextField from '@/components/forms/app-textfield.vue'
import AppFileInput from '@/components/forms/app-fileinput.vue'
import AppTextarea from '@/components/forms/app-textarea.vue'
import VsBlockCardToolsImages from './vs-block-card-tools-images.component.vue'
import AppFormButtons from '@/components/forms/app-form-buttons.component.vue'
import AppBtn from '@/components/elements/app-btn.component.vue'

import { onMounted, PropType, reactive, ref } from 'vue'
import { ImageType, CommonCategoryParams } from '@/models/terms'
import { Dimensions } from '@/models'

const props = defineProps({
	record: Object as PropType<Dimensions.DimensionTermState>
})

const emit = defineEmits([
  'settings-opened',
  'copied',
  'moved',
  'hidden',
  'submitted',
  'load-media-requested',
])

const settingsForm = reactive({
  title: '',
  description: '',
  price: null,
  thumbnail: null,
	imageFullSize: null,
  relatedImage: null,
} as CommonCategoryParams)

const menuModel = ref(false)

async function openMediaLib(imageType: ImageType) {
  emit('load-media-requested', imageType)
}

onMounted(() => {
	settingsForm.title = props.record?.title ?? ''
	settingsForm.description = props.record?.description ?? ''
	settingsForm.price = props.record?.acf?.price

	console.log(props.record)
})
</script>

<style lang="scss" scoped>
.vs-block-tools-settings {
  min-width: 400px;
}
</style>