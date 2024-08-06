<template>
	<div class="app-term-info-block">
		<template v-if="term">
			<p class="app-color-red">{{ term.acf?.blockNumber }}</p>
			<p>{{ term.acf?.blockTitle }}</p>
			<p>{{ term.acf?.blockInfo }}</p>
		</template>

		<AppBtn icon flat @click="emit('edit-info-requested')">
			<IconEdit />
		</AppBtn>

		<VsBlockTools
			v-if="hasSlot('settings')"
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
import VsBlockTools from '@/components/vs-block/components/vs-block-tools.component.vue'
import AppBtn from '@/components/elements/app-btn.component.vue'
import { useSlots } from 'vue'
import IconEdit from '@/components/icons/IconEdit.vue'
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
