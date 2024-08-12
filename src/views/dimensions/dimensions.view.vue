<template>
	<DimensionsProductType
		v-if="store.state.parent"
		@edit-info-requested="editTermInfoBlockFormRef?.open($event)"
	>
		<draggable
			v-model="store.state.productTypes"
			@end="dragTerm($event, {
				parentId: store.state.parent!.id,
				taxonomy: store.state.taxonomy
			})"
			class="block-draggable"
			item-key="id"
		>
			<template #item="{ element }">
				<VsBlockCard
					:class="{
						'app-block-card-active': element.id === store.state.selectedProductTypeId,
						'is-term-visibility': element.acf.isHidden,
					}"
					:key="element.id"
					:record="element"
					:deleteLoading="store.imageDeleting"
					:loading="progress.savingCardSettings"
					:data-id="element.id"
					@click="store.state.selectedProductTypeId = element.id"
					@settings-saved="saveCardSettings(element.id, $event)"
					@load-image-requested="loadImages(element.id, $event)"
					@remove-image-requested="store.removeImageFromTerm(element.id, $event)"
					@visibility-changed="changeVisibility(element.id, !element.acf.isHidden)"
					@duplicated="duplicateTerm(element.id, store.state.taxonomy)"
					@removed="removeTerm(element.id, store.state.taxonomy)"
				/>
			</template>

			<template #footer>
				<VsBlockAdd :sort="false" @added="addTermFromRef?.open({
					title: 'Add configuration',
					taxonomy: store.state.taxonomy,
					parentId: store.state.parent?.id,
				})" />
			</template>
		</draggable>
	</DimensionsProductType>

	<DimensionsConfiguration
		v-if="store.state.selectedProductTypeId"
		@edit-info-requested="editTermInfoBlockFormRef?.open($event)"
	>
		<draggable
			v-model="store.state.configurations"
			@end="dragTerm($event, {
				parentId: store.state.selectedProductTypeId,
				taxonomy: store.state.taxonomy
			})"
			class="block-draggable"
			item-key="id"
		>
			<template #item="{ element }">
				<VsBlockCard
					v-show="element.productTypeParentId === store.state.selectedProductTypeId || store.setting.showAllConfigurations"
					:class="{
						'is-term-visibility': element.acf.isHidden,
						'app-block-card-active': element.id === store.state.selectedConfigurationId,
					}"
					:record="element"
					:deleteLoading="store.imageDeleting"
					:loading="progress.savingCardSettings"
					:data-id="element.id"
					@settings-saved="saveCardSettings(element.id, $event)"
					@load-image-requested="loadImages(element.id, $event)"
					@remove-image-requested="store.removeImageFromTerm(element.id, $event)"
					@visibility-changed="changeVisibility(element.id, !element.acf.isHidden)"
					@duplicated="duplicateTerm(element.id, store.state.taxonomy)"
					@removed="removeTerm(element.id, store.state.taxonomy)"
					@click="store.state.selectedConfigurationId = element.id"
				/>
			</template>

			<template #footer>
				<VsBlockAdd @added="addTermFromRef?.open({
				title: 'Add dimensions',
				taxonomy: store.state.taxonomy,
				parentId: store.state.selectedProductTypeId,
			})" />
			</template>

		</draggable>
	</DimensionsConfiguration>

	<DimensionsFigure v-if="store.state.selectedProductTypeId" />

	<AppMediaModal
		ref="mediaModal"
		:callback="store.loadDimensions"
		@selected="mediaModal?.assignImageToTerm($event, store.termImageToUpload)"
	/>

	<AddTermForm ref="addTermFromRef" :callback="store.loadDimensions" />
	<EditTermInfoBlockForm ref="editTermInfoBlockFormRef" :callback="store.loadDimensions" />
</template>

<script lang="ts" setup>
import DimensionsProductType from './components/blocks/dimensions-product-type.component.vue'
import DimensionsConfiguration from './components/blocks/dimensions-configuration.component.vue'
import VsBlockCard from '@/components/vs-block/components/vs-block-card.component.vue'
import AppMediaModal from '@/components/media/app-media-modal.component.vue'
import VsBlockAdd from '@/components/vs-block/components/vs-block-add.component.vue'
import AddTermForm from '@/components/terms/add/add-term-form.drawer.vue'
import EditTermInfoBlockForm from '@/components/terms/edit-info/edit-term-info-block-form.drawer.vue'
import DimensionsFigure from './components/blocks/dimensions-figure.component.vue'

import draggable from 'vuedraggable'

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
	dragTerm,
	loading,
	progress,
} = useTerm(store.loadDimensions)

const mediaModal = ref()
const currentTaxSeparate = ref()
const addTermFromRef = ref()
const editTermInfoBlockFormRef = ref()


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
	store.setCardDefault()
})

onUnmounted(() => {

})
</script>