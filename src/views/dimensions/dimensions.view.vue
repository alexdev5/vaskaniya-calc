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
			:loading="loading"
			@click="store.state.currentProductType = card"
			@settings-saved="saveCardSettings(card.id, $event)"
			@load-image-requested="loadImages(card.id, $event)"
			@remove-image-requested="store.removeImageFromTerm(card.id, $event)"
			@visibility-changed="changeVisibility(
					card.id,
					!card.acf.isVisible,
					store.loadDimensions
				)"
			@duplicated="duplicateTerm(
				card.id,
				store.loadDimensions
			)"
		/>

		<VsBlockAdd @added="addTermFromRef?.open('Add dimensions')" />
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
				:loading="loading"
				@settings-saved="saveCardSettings(configuration.id, $event)"
				@load-image-requested="loadImages(configuration.id, $event)"
				@remove-image-requested="store.removeImageFromTerm(configuration.id, $event)"
				@visibility-changed="changeVisibility(
					configuration.id,
					!configuration.acf.isVisible,
					store.loadDimensions
				)"
				@duplicated="duplicateTerm(
					configuration.id,
					store.loadDimensions
				)"
			/>
		</template>

		<VsBlockAdd @added="addTermFromRef?.open('Add dimensions')" />
	</DimensionsConfiguration>

	<AppMediaModal
		ref="mediaModal"
		:callback="store.loadDimensions"
		@selected="mediaModal?.assignImageToTerm($event, store.termImageToUpload)"
	/>

	<AddTermForm ref="addTermFromRef" />
</template>

<script lang="ts" setup>
import DimensionsProductType from './components/blocks/dimensions-product-type.component.vue'
import DimensionsConfiguration from './components/blocks/dimensions-configuration.component.vue'
import VsBlockCard from '@/components/vs-block/components/vs-block-card.component.vue'
import AppMediaModal from '@/components/media/app-media-modal.component.vue'
import VsBlockAdd from '@/components/vs-block/components/vs-block-add.component.vue'
import AddTermForm from '@/components/terms/add-term-form.component.vue'

import { onMounted, ref } from 'vue'
import { useDimensionsStore } from './dimensions.store.ts'
import { CommonCategoryParams, ImageType } from '@/models/terms'
import { DimensionsService, TermsService } from '@/services'
import { useTerm } from '@/composables'
import { content } from '@/content'

const store = useDimensionsStore()

const { changeVisibility, duplicateTerm } = useTerm()

const loading = ref(false)
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

async function saveCardSettings(termId: number, formFields: CommonCategoryParams) {
	loading.value = true

	try {
		if (
			formFields.imageFullSize?.length ||
			formFields.thumbnail?.length ||
			formFields.relatedImage?.length
		) {
			await TermsService.addImages({
				termId,
				imageFullSize: formFields.imageFullSize?.[0] ?? null,
				thumbnail: formFields.thumbnail?.[0] ?? null,
				childBlockImage: formFields.childBlockImage?.[0] ?? null,
			})
		}

		await DimensionsService.updateTerm({
			termId,
			title: formFields.title,
			description: formFields.description,
			price: formFields.price,
		})

		await store.loadDimensions()

		console.log(content.notifications.updated)
	} catch (error: any) {
		console.error(error)
	} finally {
		loading.value = false
	}
}

onMounted(async () => {
	await store.loadDimensions()
	store.setCardDefault()
})

</script>