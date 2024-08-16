<template>
	<VDialog
		v-model="widgetOpened"
		class="app-confirmation-dialog app-dialog"
		transition="dialog-center-transition"
	>
		<VCard>
			<template #title v-if="hasSlot('title')">
				<slot name="title" />
			</template>

			<div class="app-dialog-content">
				<slot />
			</div>

			<template #actions>
				<AppBtn
					outlined
					v-if="!submitOnly"
					@click="emit('canceled')"
				>
					{{ labelCansel ? labelCansel : content.common.button.cancel }}
				</AppBtn>
				<AppBtn
					flat
					:loading="loading"
					:disabled="disabled"
					@click="emit('submitted')"
				>
					{{ labelSuccess ? labelSuccess : content.common.button.confirm }}
				</AppBtn>
			</template>
		</VCard>
	</VDialog>
</template>

<script lang="ts" setup>
import AppBtn from '@/components/elements/app-btn.component.vue'

import { content } from '@/content'
import { ref, useSlots } from 'vue'

defineProps<{
	labelCansel?: string,
	labelSuccess?: string,
	loading?: boolean,
	disabled?: boolean,
	submitOnly?: boolean,
}>()

const emit = defineEmits(['canceled', 'submitted'])

const widgetOpened = ref(false)

const slots = useSlots()
const hasSlot = (name: string) => Boolean(slots[name])

async function open() {
	widgetOpened.value = true
}

function close() {
	widgetOpened.value = false
}

defineExpose({
	open,
	close,
})
</script>

<style lang="scss">

</style>