<template>
	<div class="vs-block-card">
		<VsBlockCardTools
			ref="vsBlockCardToolsRef"
			:record="record"
			:deleteLoading="deleteLoading"
			@submitted="emit('settings-saved', $event)"
			@load-image-requested="emit('load-image-requested', $event)"
			@removed="emit('removed', $event)"
		/>

		<div class="vs-block-card-image">
			<img :src="record.acf?.thumbnail?.url" alt="">
		</div>
		<div class="vs-block-card-title">
			{{ record.title }}
		</div>
		<div class="vs-block-card-description" v-if="record.description">
			{{ record.description }}
		</div>
		<div class="vs-block-card-price" v-if="record.acf?.price">
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
})

const emit = defineEmits(['settings-saved', 'load-image-requested', 'removed'])
const vsBlockCardToolsRef = ref()

</script>

<style lang="scss">

</style>