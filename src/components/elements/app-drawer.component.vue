<template>
	<VLayout class="app-drawer">
		<VNavigationDrawer
			:model-value="opened"
			@update:model-value="onClose"
			temporary
			location="right"
			width="480"
		>
			<template #prepend>
				<div class="app-drawer--header">
					<slot name="header">
						<div class="app-drawer--header-title">
							{{ title }}
						</div>
						<AppBtn icon small text @click="onClose">
							<IconCloseCircleFilled />
						</AppBtn>
					</slot>
				</div>
			</template>

			<slot></slot>

			<template #append v-if="hasSlot('footer')">
				<slot name="footer"></slot>
			</template>
		</VNavigationDrawer>
	</VLayout>
</template>

<script lang="ts" setup>
import AppBtn from '@/components/elements/app-btn.component.vue'

import { useSlots, watch } from 'vue'
import IconCloseCircleFilled from '@/components/icons/IconCloseCircleFilled.vue'

const props = defineProps({
	opened: Boolean,
	title: {
		type: String,
		required: true,
	},
})

const emit = defineEmits(['update:model-value', 'closed'])

const slots = useSlots()
const hasSlot = (name: string) => Boolean(slots[name])

function onClose() {
	emit('closed', false)
}

function disableScroll() {
	document.body.style.overflow = 'hidden'
	document.documentElement.style.overflow = 'hidden'
}

function enableScroll() {
	document.body.style.overflow = ''
	document.documentElement.style.overflow = ''
}

watch(() => props.opened, (newVal) => {
	newVal ? disableScroll() : enableScroll()
})
</script>

<style lang="scss">

</style>