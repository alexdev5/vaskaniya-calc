<template>
	<div class="vs-block-card-tools">
		<v-menu v-model="widgetOpened" :close-on-content-click="false" bottom>
			<template v-slot:activator="{ props }">
				<div class="vs-icon-btn" v-bind="props">
					<IconSettings width="16" height="16" />
				</div>
			</template>

			<div class="vs-block-tools-settings-container">
				<TermFormFields
					:record="record"
					@fields-updated="updateFields"
					@load-image-requested="emit('load-image-requested', $event)"
					@remove-image-requested="emit('remove-image-requested', $event)"
				/>

				<AppFormButtons
					submit-only
					:disabled="disabled"
					:loading="loading"
					@closed="close()"
					@submitted="emit('submitted', settingsForm)"
				/>
			</div>
		</v-menu>

		<div class="vs-icon-btn" @click.stop.prevent="emit('duplicated')">
			<IconCopy width="16" height="16" />
		</div>
		<div class="vs-icon-btn" @click.stop.prevent="emit('visibility-changed')">
			<IconEye width="16" height="16" v-if="record?.acf.isHidden" />
			<IconEyeOff width="16" height="16" v-else />
		</div>
		<div
			v-if="record?.acf.isHidden"
			class="vs-icon-btn"
			@click.stop.prevent="emit('removed')"
		>
			<IconTrash width="16" height="16" />
		</div>
	</div>
</template>

<script lang="ts" setup>
import TermFormFields from '@/components/terms/components/term-form-fields.component.vue'
import IconCopy from '@/components/icons/IconCopy.vue'
import IconSettings from '@/components/icons/IconSettings.vue'
import IconEyeOff from '@/components/icons/IconEyeOff.vue'
import IconEye from '@/components/icons/IconEye.vue'

import { PropType, ref } from 'vue'
import { ImageType, TermFromFields, TermState } from '@/models/terms'
import IconTrash from '@/components/icons/IconTrash.vue'
import AppFormButtons from '@/components/forms/app-form-buttons.component.vue'
import { useTermFormFields } from '@/components/terms/term-form-fields.composable.ts'

const props = defineProps({
	record: Object as PropType<TermState>,
	deleteLoading: Object as PropType<Record<ImageType, boolean>>,
	loading: Boolean,
})

const emit = defineEmits([
	'settings-opened',
	'duplicated',
	'moved',
	'visibility-changed',
	'submitted',
	'load-image-requested',
	'remove-image-requested',
	'removed',
])

const { settingsForm } = useTermFormFields()
const disabled = ref(true)

function updateFields(fields: TermFromFields) {
	// TODO: dont working disabled
	disabled.value = false
	settingsForm.value = fields
}

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