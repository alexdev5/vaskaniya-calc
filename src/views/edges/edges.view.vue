<template>
	<h1>edges</h1>
	{{ content.common.button.cancel }}

	<AppMediaModal
		ref="mediaModal"
		:callback="store.load"
		@selected="mediaModal?.assignImageToTerm($event.id, selectedImageToUpload)"
	/>
</template>

<script lang="ts" setup>
import AppMediaModal from '@/components/media/app-media-modal.component.vue'

import { content } from '@/content'
import { useTerm } from '@/composables'
import { useEdgesStore } from '@/views/edges/edges.store.ts'
import { onMounted, ref } from 'vue'
import { ImageType } from '@/models/terms'

const store = useEdgesStore()
const {
	changeVisibility,
	duplicateTerm,
	saveCardSettings,
	removeTerm,
	dragTerm,
	loading,
	progress,
	selectedImageToUpload,
} = useTerm(store.load)

const mediaModal = ref()

async function loadImages(termId: number, mediaType: ImageType) {
	selectedImageToUpload.type = mediaType
	selectedImageToUpload.termId = termId

	mediaModal.value?.open()
}

onMounted(async () => {
	await store.load()
	store.setCardDefault()
})
</script>

<style lang="scss">

</style>