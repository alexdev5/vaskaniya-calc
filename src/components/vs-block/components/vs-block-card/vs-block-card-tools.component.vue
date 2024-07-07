<template>
	<div class="vs-block-card-tools">
		<v-menu v-model="widgetOpened" :close-on-content-click="false" bottom>
			<template v-slot:activator="{ props }">
				<div class="vs-icon-btn" v-bind="props">
					<IconSettings width="16" height="16" />
				</div>
			</template>

			<VsTermSettingsForm
				:record="record"
				@load-image-requested="emit('load-image-requested', $event)"
				@submitted="emit('submitted', $event)"
				@remove-image-requested="emit('remove-image-requested', $event)"
				@closed="close()"
			/>
		</v-menu>

		<div class="vs-icon-btn" @click.stop.prevent="emit('duplicated')">
			<IconCopy width="16" height="16" />
		</div>
		<div class="vs-icon-btn" @click.stop.prevent="emit('moved')">
			<IconArrowsMove width="16" height="16" />
		</div>
		<div class="vs-icon-btn" @click.stop.prevent="emit('hidden')">
			<IconEyeOff width="16" height="16" />
		</div>
	</div>
</template>

<script lang="ts" setup>
import VsTermSettingsForm from '@/components/vs-terms/vs-term-settings-form.component.vue'
import IconCopy from '@/components/icons/IconCopy.vue'
import IconSettings from '@/components/icons/IconSettings.vue'
import IconArrowsMove from '@/components/icons/IconArrowsMove.vue'
import IconEyeOff from '@/components/icons/IconEyeOff.vue'

import { PropType, ref } from 'vue'
import { ImageType, TermState } from '@/models/terms'

const props = defineProps({
	record: Object as PropType<TermState>,
	deleteLoading: Object as PropType<Record<ImageType, boolean>>,
})

const emit = defineEmits([
	'settings-opened',
	'duplicated',
	'moved',
	'hidden',
	'submitted',
	'load-image-requested',
	'removed',
])


const widgetOpened = ref(false)

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

<style lang="scss" scoped>
.vs-block-tools-settings {
	min-width: 400px;
}
</style>