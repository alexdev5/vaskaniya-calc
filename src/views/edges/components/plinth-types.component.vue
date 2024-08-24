<template>
	<VsBlock :info="infoForBlock" @edit-info-requested="openTermInfoBlock">
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
					title: content.dimensions.productType.title,
					taxonomy: store.state.taxonomy,
					parentId: store.state.parent?.id,
				})" />
			</template>
		</draggable>
	</VsBlock>

	<AddTermForm ref="addTermFromRef" :callback="store.loadDimensions" />
	<EditTermInfoBlockForm ref="editTermInfoBlockFormRef" :callback="store.loadDimensions" />
</template>

<script lang="ts" setup>
import VsBlock, { BlockInfo } from '@/components/app-block/vs-block.component.vue'
import { useEdgesStore } from '@/views/edges/edges.store.ts'
import { computed, ref } from 'vue'
import VsBlockAdd from '@/components/app-block/components/vs-block-add.component.vue'
import VsBlockCard from '@/components/app-block/components/vs-block-card.component.vue'

import draggable from 'vuedraggable'
import { useTerm } from '@/composables'
import { ImageType } from '@/models/terms'
import EditTermInfoBlockForm from '@/components/terms/edit-info/edit-term-info-block-form.drawer.vue'
import AddTermForm from '@/components/terms/add/add-term-form.drawer.vue'

const emit = defineEmits(['edit-info-requested', 'load-library-requested'])

const store = useEdgesStore()
const addTermFromRef = ref()
const editTermInfoBlockFormRef = ref()

const {
	changeVisibility,
	duplicateTerm,
	saveCardSettings,
	removeTerm,
	dragTerm,
	loading,
	progress,
} = useTerm(store.load)

const infoForBlock = computed(() => ({
	number: store.state.plinthTypes?.acf.blockNumber,
	title: store.state.plinthTypes?.acf.blockTitle,
	info: store.state.plinthTypes?.acf.blockInfo,
} as BlockInfo))

function openTermInfoBlock() {
	if (!store.selectedProductType) {
		console.error('store.state.selectedProductTypeId: ', store.selectedProductType)
		return
	}

	emit('edit-info-requested', {
		id: store.state.selectedProductTypeId,
		taxonomy: store.state.taxonomy,
		number: store.selectedProductType.acf.blockNumber,
		title: store.selectedProductType.acf.blockTitle,
		info: store.selectedProductType.acf.blockInfo,
	})
}

async function loadImages(termId: number, mediaType: ImageType) {
	store.termImageToUpload.type = mediaType
	store.termImageToUpload.termId = termId

	mediaModal.value?.open()
}
</script>

<style lang="scss">

</style>