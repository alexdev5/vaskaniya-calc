<template>
	<AppModal ref="mediaModal" @closed="close">
		<template #header-fixed>
			<div>
				<p v-if="mediaSelected.title">
          <span>
            <b>image:</b> {{ mediaSelected.fullName }} <b>|</b> {{ mediaSelected.id }}
          </span>
				</p>
				<p v-else>Изображение не выбрано</p>
			</div>
		</template>

		<div class="app-media-list">
			<div
				v-for="media in mediaStore.state.media"
				class="app-media-list-item"
				:class="{ 'active': mediaSelected.id === media.id }"
				@click="mediaSelected = media"
			>
				<div class="app-media-list-item-img">
					<img :src="media.url" alt="">
				</div>

				<div class="app-media-list-item-description">
					<p><b>ID:</b> {{ media.id }}</p>
					<p><b>Name:</b> {{ media.fullName }}</p>
					<!--<p><b>url:</b> {{ media.url }}</p>-->
				</div>
			</div>
		</div>

		<template #actions>
			<AppBtn
				flat
				:disabled="!mediaSelected.id"
				:loading="loading"
				@click="emit('selected', mediaSelected)"
			>
				Выбрать
			</AppBtn>
			<AppBtn
				outlined
				@click="close()"
			>
				Закрыть
			</AppBtn>
		</template>
	</AppModal>
</template>

<script lang="ts" setup>
import AppModal from '@/components/elements/app-modal.component.vue'
import AppBtn from '@/components/elements/app-btn.component.vue'
import { ref } from 'vue'
import { ImageContract } from '@/api/terms/terms.contracts'
import { useMediaStore } from '@/stores'
import { termsApi } from '@/services'
import { Terms } from '@/models'

const props = defineProps<{
	//loading: boolean
	callback?: () => Promise<void>
}>()

const emit = defineEmits(['selected'])

const mediaStore = useMediaStore()

const mediaModal = ref()
const mediaSelected = ref({} as ImageContract)
const mediaLoading = ref(false)
const loading = ref(false)

async function open() {
	mediaModal.value?.open()
	await loadMedia()
}

function close() {
	mediaSelected.value = {} as ImageContract
	mediaModal.value?.close()
}

async function loadMedia() {
	mediaLoading.value = true

	try {
		await mediaStore.loadMedia()
	} catch (error: any) {
		console.log(error)
	} finally {
		mediaLoading.value = false
	}
}

async function assignImageToTerm(mediaId: number, params: Terms.AssignImageCommand) {
	loading.value = true

	try {
		await termsApi.assignImage({
			imageId: mediaId,
			termId: params.termId,
			type: params.type,
		})
		if (props.callback) await props.callback()
		close()
		console.log('Изображение выбрано успешно')
	} catch (error: any) {
		console.log('assignImageToTerm', error)
	} finally {
		loading.value = false
	}
}

defineExpose({
	open,
	close,
	assignImageToTerm,
})
</script>

<style lang="scss">

</style>