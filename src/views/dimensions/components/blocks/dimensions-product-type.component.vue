<template>
  <VsBlock
    :title="titleBlock"
    :title-number="numberBlock"
		@submitted="submit"
  >
    <slot />

    <template #settings>
      <AppCheckbox
        :modelValue="childBlockShowing"
        @update:modelValue="updateChildShowing"
        label="Отобразить дочерние блоки"
      />
    </template>
  </VsBlock>

</template>

<script lang="ts" setup>
import VsBlock, { SubmitBlockHeaderEvent } from '@/components/vs-block/vs-block.component.vue'

import { ref } from 'vue'
import { useDimensionsStore } from '@/views/dimensions/dimensions.store.ts'
import AppCheckbox from '@/components/forms/app-checkbox.vue'
import { DimensionsService } from '@/services'

defineProps({
  settingsLoading: Boolean
})

const emit = defineEmits(['child-showing-updated'])
const store = useDimensionsStore()

const loading = ref(false)
const titleBlock = ref('')
const numberBlock = ref('')
const childBlockShowing = ref(false)

function updateChildShowing(value: boolean) {
  childBlockShowing.value = value
  emit('child-showing-updated', value)
}

async function submit(fields: SubmitBlockHeaderEvent) {
	loading.value = true

	if (!store.state.parent)
		throw new Error('Parent term empty')

	try {
		await DimensionsService.updateParentTitle({
			termId: store.state.parent.id,
			title: titleBlock.value,
			titleNumber: numberBlock.value,
		})
	} catch (error: any) {
		console.error('changeBlockTitle', error)
	} finally {
		loading.value = false
	}
	console.log(fields)
}
</script>

<style lang="scss">

</style>