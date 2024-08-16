<template>
	<div class="app-form-buttons">
		<AppBtn
			outlined
			v-if="!submitOnly"
			@click="emit('closed')"
		>
			{{ labelCansel ? labelCansel : content.common.button.cancel }}
		</AppBtn>
		<AppBtn
			flat
			:loading="loading"
			:disabled="disabled"
			@click="emit('submitted')"
		>
			{{ labelSuccess ? labelSuccess : content.common.button.save }}
		</AppBtn>
	</div>
</template>

<script lang="ts" setup>
import AppBtn from '@/components/elements/app-btn.component.vue'

import { content } from '@/content'

defineProps({
	labelCansel: {
		type: String,
	},
	labelSuccess: {
		type: String,
	},
	loading: Boolean,
	disabled: Boolean,
	submitOnly: Boolean,
})

const emit = defineEmits(['closed', 'submitted'])
</script>

<style lang="scss">
.app-form-buttons {
	display: flex;
	gap: 16px;
	justify-content: end;

	.app-btn {
		flex-grow: 1;
	}
}
</style>