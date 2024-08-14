<template>
	<div class="app-term-info-block">
		<div class="app-term-info-block-header">
			<p class="app-color-red bold">{{ info.number }}</p>
			<p>{{ info.title }}</p>
			<p class="app-term-info-block-header-info app-flex app-gap-xs" v-if="info.info">
				<IconInfoCircle />
				{{ info.info }}
			</p>

			<AppBtn icon flat @click="emit('edit-info-requested')">
				<IconEdit />
			</AppBtn>
		</div>

		<VsBlockTools
			v-if="hasSlot('settings')"
			@settings-opened="emit('settings-opened')"
		>
			<template #settings>
				<slot name="settings"></slot>
			</template>
		</VsBlockTools>

		<div class="app-term-block-prepend" v-if="hasSlot('prepend')">
			<slot name="prepend" />
		</div>

		<div class="app-term-block-body">
			<slot />
		</div>

		<div class="app-term-block-prepend" v-if="hasSlot('append')">
			<slot name="append" />
		</div>
	</div>
</template>

<script lang="ts" setup>
import VsBlockTools from '@/components/app-block/components/vs-block-tools.component.vue'
import AppBtn from '@/components/elements/app-btn.component.vue'
import IconInfoCircle from '@/components/icons/IconInfoCircle.vue'
import IconEdit from '@/components/icons/IconEdit.vue'

import { useSlots } from 'vue'

export interface BlockInfo {
	number: string | number
	title: string
	info?: string
}

defineProps<{
	info: BlockInfo
}>()

const emit = defineEmits(['edit-info-requested', 'settings-opened'])

const slots = useSlots()
const hasSlot = (name: string) => Boolean(slots[name])
</script>

<style lang="scss">

</style>
