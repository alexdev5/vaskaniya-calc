<template>
	<div class="app-block-card">
		<VsBlockCardTools
			ref="vsBlockCardToolsRef"
			:class="{ 'hidden': record.acf.isHidden }"
			:record="record"
			:deleteLoading="deleteLoading"
			:loading="loading"
			@submitted="emit('settings-saved', $event)"
			@load-image-requested="emit('load-image-requested', $event)"
			@remove-image-requested="emit('remove-image-requested', $event)"
			@visibility-changed="emit('visibility-changed', $event)"
			@removed="emit('removed')"
			@duplicated="emit('duplicated')"
		/>

		<div class="app-block-card-image">
			<img :src="record.thumbnailImageUrl" alt="">
		</div>
		<div class="app-block-card-title">
			{{ record.title }}
		</div>
		<div class="app-block-card-description" v-if="record.description">
			{{ record.description }}
		</div>
		<div class="app-block-card-price" v-if="record.acf?.price">
			{{ record.acf.price }}
		</div>
	</div>
</template>

<script lang="ts" setup>
import VsBlockCardTools from './vs-block-card/vs-block-card-tools.component.vue'

import { PropType, ref } from 'vue'
import { ImageType, TermState } from '@/models/terms'

defineProps({
	record: {
		type: Object as PropType<TermState>,
		required: true,
	},
	deleteLoading: Object as PropType<Record<ImageType, boolean>>,
	loading: Boolean,
})

const emit = defineEmits([
	'settings-saved',
	'load-image-requested',
	'remove-image-requested',
	'visibility-changed',
	'removed',
	'duplicated',
])
const vsBlockCardToolsRef = ref()

</script>

<style lang="scss">

</style>