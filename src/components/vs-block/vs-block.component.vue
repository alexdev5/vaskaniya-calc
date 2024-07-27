<template>
	<div class="vs-block">
		<div class="vs-block-title">
			<AppTextfield
				class="vs-color-red"
				:label="content.label.number"
				:model-value="titleNumber"
				@update:model-value="emit('update:title-number', $event)"
			/>
			<AppTextfield
				:label="content.label.blockTitle"
				:model-value="title"
				@update:model-value="emit('update:title', $event)"
			/>

			<AppBtn
				icon
				flat
				:loading="loading"
				:disabled="disabled"
				@click="emit('submitted')"
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
import { content } from '@/content'

const props = defineProps<{
	loading?: boolean
	disabled?: boolean
	title?: string
	titleNumber?: string
}>()

const emit = defineEmits([
	'settings-opened',
	'submitted',
	'update:title',
	'update:title-number',
])
</script>

<style lang="scss">

</style>
