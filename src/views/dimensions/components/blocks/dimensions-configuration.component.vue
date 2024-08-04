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

	</VsBlock>
</template>

<script lang="ts" setup>
import VsBlock from '@/components/vs-block/vs-block.component.vue'

import { ref, watch } from 'vue'
import { useDimensionsStore } from '@/views/dimensions/dimensions.store.ts'
import { dimensionsApi } from '@/services'

defineProps({
	settingsLoading: Boolean,
})

const emit = defineEmits(['child-showing-updated'])
const store = useDimensionsStore()

const loading = ref(false)
const disabled = ref(true)
const blockTitle = ref('')
const blockNumber = ref('')

const childBlockShowing = ref(false)

async function submit() {
	loading.value = true

	if (!store.state.parent)
		throw new Error('Parent term empty')

	try {
		await dimensionsApi.updateTermTitle({
			termId: store.state.currentProductType!.id,
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
		blockTitle.value === store.state.currentProductType?.acf?.blockTitle &&
		blockNumber.value === store.state.currentProductType?.acf?.blockNumber
})

watch(() => store.state.currentProductType, () => {
	blockTitle.value = store.state.currentProductType?.acf?.blockTitle ?? ''
	blockNumber.value = store.state.currentProductType?.acf?.blockNumber ?? ''
}, { immediate: true })
</script>

<style lang="scss">

</style>