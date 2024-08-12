<template>
	<VsBlock :info="blockInfo" @edit-info-requested="openTermChildInfoBlock">
		<slot />

		<template #settings>
			<AppCheckbox
				v-model="store.setting.showAllConfigurations"
				label="Отобразить дочерние блоки"
			/>
			<AppCheckbox
				v-model="store.setting.showHiddenFields"
				label="Показать информационные поля"
			/>
		</template>
	</VsBlock>

	<EditLastChildInfo ref="editLastChildInfoRef" :callback="store.loadDimensions" />
</template>

<script lang="ts" setup>
import AppCheckbox from '@/components/forms/app-checkbox.vue'
import VsBlock, { BlockInfo } from '@/components/vs-block/vs-block.component.vue'

import { computed, ref } from 'vue'
import { useDimensionsStore } from '@/views/dimensions/dimensions.store.ts'
import EditLastChildInfo from '@/components/terms/edit-last-child-info/edit-last-child-info.drawer.vue'

const emit = defineEmits(['edit-info-requested'])
const store = useDimensionsStore()

const editLastChildInfoRef = ref()

const blockInfo = computed(() => ({
	number: store.selectedProductType?.acf.lastChildBlockNumber,
	title: store.selectedProductType?.acf.lastChildBlockTitle,
	info: store.selectedProductType?.acf.lastChildBlockInfo,
} as BlockInfo))

function openTermChildInfoBlock() {
	if (!store.selectedProductType) {
		console.error('store.state.selectedProductTypeId: ', store.state.selectedProductTypeId)
		return
	}

	editLastChildInfoRef.value?.open({
		id: store.state.selectedProductTypeId,
		taxonomy: store.state.taxonomy,
		childNumber: store.selectedProductType.acf.lastChildBlockNumber,
		childTitle: store.selectedProductType.acf.lastChildBlockTitle,
		childInfo: store.selectedProductType.acf.lastChildBlockInfo,
	})
}
</script>

<style lang="scss">

</style>