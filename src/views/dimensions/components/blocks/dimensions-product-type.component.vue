<template>
	<VsBlock :info="infoForBlock" @edit-info-requested="openTermInfoBlock">
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

</template>

<script lang="ts" setup>
import VsBlock, { BlockInfo } from '@/components/app-block/vs-block.component.vue'
import AppCheckbox from '@/components/forms/app-checkbox.vue'
import { useDimensionsStore } from '@/views/dimensions/dimensions.store.ts'
import { computed } from 'vue'

const emit = defineEmits(['edit-info-requested'])
const store = useDimensionsStore()

const infoForBlock = computed(() => ({
	number: store.state.parent?.acf.blockNumber,
	title: store.state.parent?.acf.blockTitle,
	info: store.state.parent?.acf.blockInfo,
} as BlockInfo))

function openTermInfoBlock() {
	if (!store.state.parent) {
		console.error('store.state.parent: ', store.state.parent)
		return
	}

	emit('edit-info-requested', {
		id: store.state.parent.id,
		taxonomy: store.state.taxonomy,
		number: store.state.parent.acf.blockNumber,
		title: store.state.parent.acf.blockTitle,
		info: store.state.parent.acf.blockInfo,
	})
}
</script>

<style lang="scss">

</style>