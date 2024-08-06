<template>
	<div class="app-term-info-block">
		<div v-if="term" class="app-term-info-block-header">
			<p class="app-color-red bold">{{ term.acf?.blockNumber }}</p>
			<p>{{ term.acf?.blockTitle }}</p>
			<p class="app-term-info-block-header-info app-flex app-gap-xs" v-if="term.acf?.blockInfo">
				<IconInfoCircle />
				{{ term.acf?.blockInfo }}
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

		<div class="app-term-block-body">
			<slot />
		</div>
	</div>
</template>

<script lang="ts" setup>
import VsBlockTools from '@/components/vs-block/components/vs-block-tools.component.vue'
import AppBtn from '@/components/elements/app-btn.component.vue'
import IconInfoCircle from '@/components/icons/IconInfoCircle.vue'
import IconEdit from '@/components/icons/IconEdit.vue'

import { useSlots } from 'vue'
import { TermState } from '@/models/terms'

defineProps<{
	term: TermState | null
}>()

const emit = defineEmits(['edit-info-requested', 'settings-opened'])

const slots = useSlots()
const hasSlot = (name: string) => Boolean(slots[name])
</script>

<style lang="scss">

</style>
