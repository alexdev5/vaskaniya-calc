<template>
	<DimensionsProductType v-if="store.state.parent">
		<draggable
			v-model="store.state.productTypes"
			@end="dragTerm($event, {
				parentId: store.state.parent!.id,
				taxonomy: store.state.taxonomy
			})"
			class="block-draggable"
			item-key="id"
		>
			<template #item="{ element, index }">
				<VsBlockCard
					:class="{
						'vs-block-card-active': element.id === store.state.currentProductType?.id,
						'is-term-visibility': element.acf.isHidden,
					}"
					:key="element.id"
					:record="element"
					:deleteLoading="store.imageDeleting"
					:loading="progress.savingCardSettings"
					:data-id="element.id"
					@click="store.state.currentProductType = element"
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

	<DimensionsConfiguration v-if="store.state.currentProductType">
		<draggable
			v-model="store.state.configurations"
			@end="dragTerm($event, {
				parentId: store.state.currentProductType!.id,
				taxonomy: store.state.taxonomy
			})"
			class="block-draggable"
			item-key="id"
		>
			<template #item="{ element, index }">
				<VsBlockCard
					v-show="element.productTypeParentId === store.state.currentProductType?.id || store.setting.showAllConfigurations"
					:class="{
						'is-term-visibility': element.acf.isHidden,
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
				/>
			</template>

			<template #footer>
				<VsBlockAdd @added="addTermFromRef?.open({
				title: 'Add dimensions',
				taxonomy: store.state.taxonomy,
				parentId: store.state.currentProductType?.id,
			})" />
			</template>

		</draggable>
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