<template>
	<VsBlock :info="infoForBlock" @edit-info-requested="openTermInfoBlock">
		<slot />
	</VsBlock>
</template>

<script lang="ts" setup>
import VsBlock, { BlockInfo } from '@/components/vs-block/vs-block.component.vue'
import { useDimensionsStore } from '@/views/dimensions/dimensions.store.ts'
import { computed } from 'vue'

defineProps({
	settingsLoading: Boolean,
})

const emit = defineEmits(['edit-info-requested'])
const store = useDimensionsStore()

const infoForBlock = computed(() => ({
	number: store.selectedProductType?.acf.blockNumber,
	title: store.selectedProductType?.acf.blockTitle,
	info: store.selectedProductType?.acf.blockInfo,
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
</script>

<style lang="scss">

</style>