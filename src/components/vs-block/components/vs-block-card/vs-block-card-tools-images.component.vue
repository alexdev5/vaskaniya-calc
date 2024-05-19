<template>
	<div class="vs-block-tools-settings-image">
		<p class="vs-label">
			{{ label }}:
		</p>

		<div class="existing-image" v-if="image">
			<img :src="image.url" alt="">
			<div class="existing-image-info">
				<ul class="app-list-standard small">
					<li>{{ image.fullName }}</li>
					<li>{{ image.modified }}</li>
				</ul>

				<AppBtn icon x-small>
					<IconTrash />
				</AppBtn>
			</div>
		</div>

		<div class="vs-block-tools-settings-image-actions" v-else>
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
				icon
				x-small
				:loading="buttonLibLoading"
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

import { PropType } from 'vue'
import { Image } from '@/models/terms'

defineProps({
  label: String,
	image: {
    type: Object as PropType<Image | null>
  },
  modelValue: {
    type: Object as PropType<any>
  },
  buttonLibLoading: Boolean
})

function log(data) {
	console.log(data)
}
const emit = defineEmits(['update:model-value', 'lib-opened'])
</script>

<style lang="scss">

</style>