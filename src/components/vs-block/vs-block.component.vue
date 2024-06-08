<template>
  <div class="vs-block">
    <div class="vs-block-title">
      <AppTextfield
        class="vs-color-red"
        label="Номер"
        v-model="titleNumberModel"
      />
      <AppTextfield
        label="Тайтл блока"
        v-model="titleModel"
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
	title: string,
	titleNumber: string,
}

defineProps<{
	loading?: boolean
}>()

const titleModel = ref('')
const titleNumberModel = ref('')

const emit = defineEmits([
  'settings-opened',
  'submitted',
])

function submit() {
	emit('submitted', {
		title: titleModel.value,
		titleNumber: titleNumberModel.value,
	})
}
</script>

<style lang="scss">

</style>