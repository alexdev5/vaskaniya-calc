<template>
  <div class="vs-block">
    <div class="vs-block-title">
      <AppTextfield
        class="vs-color-red"
        label="Номер"
        v-model="blockNumberModel"
      />
      <AppTextfield
        label="Тайтл блока"
        v-model="blockTitleModel"
      />

			<AppBtn
				icon
				flat
				:loading="loading"
				@click="submit"
			>
				<IconSave />
			</AppBtn>
    </div>

    <VsBlockTools
      @settings-opened="emit('settings-opened')"
    >
      <template #settings>
        <slot name="settings"></slot>
      </template>
    </VsBlockTools>

    <div class="vs-block-body">
      <slot />
    </div>
  </div>
</template>

<script lang="ts" setup>
import AppTextfield from '@/components/forms/app-textfield.vue'
import VsBlockTools from '@/components/vs-block/components/vs-block-tools.component.vue'
import AppBtn from '@/components/elements/app-btn.component.vue'
import IconSave from '@/components/icons/IconSave.vue'
import { ref } from 'vue'

export interface SubmitBlockHeaderEvent {
	blockTitle: string,
	blockNumber: string,
}

const props = defineProps<{
	loading?: boolean
	blockTitle?: string
	blockNumber?: string
}>()

const blockTitleModel = ref(props.blockTitle)
const blockNumberModel = ref(props.blockNumber)

const emit = defineEmits([
  'settings-opened',
  'submitted',
])

function submit() {
	emit('submitted', {
		blockTitle: blockTitleModel.value,
		blockNumber: blockNumberModel.value,
	})
}
</script>

<style lang="scss">

</style>