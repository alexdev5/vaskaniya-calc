<template>
	<VsBlock
		:title="blockTitle"
		@update:title="blockTitle = $event"
		:title-number="blockNumber"
		@update:title-number="blockNumber = $event"
		:loading="loading"
		:disabled="disabled"
		@submitted="submit"
	>
		<slot />

		<template #settings>
			<AppCheckbox
				:modelValue="childBlockShowing"
				@update:modelValue="store.setting.showAllConfigurations = $event"
				label="Отобразить дочерние блоки"
			/>
		</template>
	</VsBlock>

</template>

<script lang="ts" setup>
import VsBlock from '@/components/vs-block/vs-block.component.vue'

import { ref, watch } from 'vue'
import { useDimensionsStore } from '@/views/dimensions/dimensions.store.ts'
import AppCheckbox from '@/components/forms/app-checkbox.vue'
import { DimensionsService } from '@/services'

defineProps({
	settingsLoading: Boolean,
})

const emit = defineEmits(['child-showing-updated'])
const store = useDimensionsStore()

const loading = ref(false)
const disabled = ref(true)
const blockTitle = ref(store.state.parent?.acf?.blockTitle ?? '')
const blockNumber = ref(store.state.parent?.acf?.blockNumber ?? '')

const childBlockShowing = ref(false)

async function submit() {
	loading.value = true

	if (!store.state.parent)
		throw new Error('Parent term empty')

	try {
		await DimensionsService.updateTermTitle({
			termId: store.state.parent.id,
			blockTitle: blockTitle.value,
			blockNumber: blockNumber.value,
		})

		await store.loadDimensions()

		disabled.value = true
		console.log('update success')
	} catch (error: any) {
		console.error('changeBlockTitle', error)
	} finally {
		loading.value = false
	}
}

watch([blockTitle, blockNumber], () => {
	disabled.value =
		blockTitle.value === store.state.parent?.acf?.blockTitle &&
		blockNumber.value === store.state.parent?.acf?.blockNumber
})
</script>

<style lang="scss">

</style>