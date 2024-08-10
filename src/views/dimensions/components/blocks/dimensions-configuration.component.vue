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
	number: store.state.currentProductType?.acf.blockNumber,
	title: store.state.currentProductType?.acf.blockTitle,
	info: store.state.currentProductType?.acf.blockInfo,
} as BlockInfo))

function openTermInfoBlock() {
	if (!store.state.currentProductType) {
		console.error('store.state.currentProductType: ', store.state.currentProductType)
		return
	}

	emit('edit-info-requested', {
		id: store.state.currentProductType.id,
		taxonomy: store.state.taxonomy,
		number: store.state.currentProductType.acf.blockNumber,
		title: store.state.currentProductType.acf.blockTitle,
		info: store.state.currentProductType.acf.blockInfo,
	})
}
</script>

<style lang="scss">

</style>