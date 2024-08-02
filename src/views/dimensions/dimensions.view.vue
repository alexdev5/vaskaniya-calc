<template>
	<DimensionsProductType v-if="store.state.parent">
		<VsBlockCard
			v-for="card in store.state.productTypes"
			:class="{
				'vs-block-card-active': card.id === store.state.currentProductType?.id,
				'is-term-visibility': card.acf.isVisible,
			}"
			:key="card.id"
			:record="card"
			:deleteLoading="store.imageDeleting"
			:loading="progress.savingCardSettings"
			@click="store.state.currentProductType = card"
			@settings-saved="saveCardSettings(card.id, $event)"
			@load-image-requested="loadImages(card.id, $event)"
			@remove-image-requested="store.removeImageFromTerm(card.id, $event)"
			@visibility-changed="changeVisibility(card.id, !card.acf.isVisible)"
			@duplicated="duplicateTerm(card.id, store.state.taxonomy)"
			@removed="removeTerm(card.id, store.state.taxonomy)"
		/>

		<VsBlockAdd @added="addTermFromRef?.open({
			title: 'Add configuration',
			taxonomy: store.state.taxonomy,
			parentId: store.state.parent?.id,
		})" />
	</DimensionsProductType>

	<DimensionsConfiguration v-if="store.state.currentProductType">
		<template v-for="configuration in store.state.configurations" :key="configuration.id">
			<VsBlockCard
				v-show="configuration.productTypeParentId === store.state.currentProductType?.id || store.setting.showAllConfigurations"
				:class="{
					'is-term-visibility': configuration.acf.isVisible,
				}"
				:record="configuration"
				:deleteLoading="store.imageDeleting"
				:loading="progress.savingCardSettings"
				@settings-saved="saveCardSettings(configuration.id, $event)"
				@load-image-requested="loadImages(configuration.id, $event)"
				@remove-image-requested="store.removeImageFromTerm(configuration.id, $event)"
				@visibility-changed="changeVisibility(configuration.id, !configuration.acf.isVisible)"
				@duplicated="duplicateTerm(configuration.id, store.state.taxonomy)"
				@removed="removeTerm(configuration.id, store.state.taxonomy)"
			/>
		</template>

		<VsBlockAdd @added="addTermFromRef?.open({
			title: 'Add dimensions',
			taxonomy: store.state.taxonomy,
			parentId: store.state.currentProductType?.id,
		})" />
	</DimensionsConfiguration>

	<AppMediaModal
		ref="mediaModal"
		:callback="store.loadDimensions"
		@selected="mediaModal?.assignImageToTerm($event, store.termImageToUpload)"
	/>

	<AddTermForm ref="addTermFromRef" :callback="store.loadDimensions" />
</template>

<script lang="ts" setup>
import DimensionsProductType from './components/blocks/dimensions-product-type.component.vue'
import DimensionsConfiguration from './components/blocks/dimensions-configuration.component.vue'
import VsBlockCard from '@/components/vs-block/components/vs-block-card.component.vue'
import AppMediaModal from '@/components/media/app-media-modal.component.vue'
import VsBlockAdd from '@/components/vs-block/components/vs-block-add.component.vue'
import AddTermForm from '@/components/terms/add-term-form.drawer.vue'

import { onMounted, onUnmounted, ref } from 'vue'
import { useDimensionsStore } from './dimensions.store.ts'
import { ImageType } from '@/models/terms'
import { useTerm } from '@/composables'

const store = useDimensionsStore()

const {
	changeVisibility,
	duplicateTerm,
	saveCardSettings,
	removeTerm,
	loading,
	progress,
} = useTerm(store.loadDimensions)

const mediaModal = ref()
const currentTaxSeparate = ref()
const addTermFromRef = ref()


// Сделать разделение карточек дивами, если включена галочка в
// настройках блока.
// Первый просто вывести, дальше сравнить таксономии
// если они отличаются то выводить второй див.
// Только нужно подумать когда закрытый открытый тег

async function loadImages(termId: number, mediaType: ImageType) {
	store.termImageToUpload.type = mediaType
	store.termImageToUpload.termId = termId

	mediaModal.value?.open()
}

onMounted(async () => {
	await store.loadDimensions()
})

onUnmounted(() => {

})
</script>