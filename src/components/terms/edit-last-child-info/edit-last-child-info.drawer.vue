<template>
	<AppDrawer
		class="app-edit-info-drawer"
		:opened="widgetOpened"
		@closed="close"
		:title="drawerTitle ?? content.editBlockInfo.title"
	>

		<div class="app-edit-info-form" v-if="formFields">
			<AppTextfield
				class="app-color-red"
				:label="content.label.number"
				v-model="formFields.childNumber"
			/>
			<AppTextfield
				:label="content.label.blockTitle"
				v-model="formFields.childTitle"
			/>
			<AppTextfield
				:label="content.label.blockInfo"
				v-model="formFields.childInfo"
			/>
		</div>

		<template #footer>
			<AppFormButtons
				:disabled="disabled"
				:loading="loading"
				@closed="close()"
				@submitted="submit"
			/>
		</template>
	</AppDrawer>
</template>

<script lang="ts" setup>
import AppDrawer from '@/components/elements/app-drawer.component.vue'
import AppFormButtons from '@/components/forms/app-form-buttons.component.vue'
import AppTextfield from '@/components/forms/app-textfield.vue'

import { ref } from 'vue'
import { content } from '@/content'
import { termsApi } from '@/services'
import { UpdateTermChildInfoBlockCommand } from '@/api/terms'

const props = defineProps<{
	callback?: () => Promise<void>
}>()

const formFields = ref<UpdateTermChildInfoBlockCommand | null>(null)

const drawerTitle = ref<string | undefined>('')
const loading = ref(false)
const disabled = ref(false)
const widgetOpened = ref(false)

async function submit() {
	loading.value = true

	if (!formFields.value)
		if (!formFields.value) throw new Error('formFields is null in edit-info-block-form')

	console.log(formFields.value)

	try {
		await termsApi.updateChildInfoBlock({
			id: formFields.value.id,
			taxonomy: formFields.value.taxonomy,
			childTitle: formFields.value.childTitle,
			childNumber: formFields.value.childNumber,
			childInfo: formFields.value.childInfo,
		})

		if (props.callback) await props.callback()

		console.log('update success')
		close()
	} catch (error: any) {
		console.error('editBlockInfo.drawer', error)
	} finally {
		loading.value = false
	}
}

async function open(fields: UpdateTermChildInfoBlockCommand, title?: string) {
	formFields.value = fields
	drawerTitle.value = title
	widgetOpened.value = true
}

function close() {
	widgetOpened.value = false
	formFields.value = null
}

defineExpose({
	open,
	close,
})
</script>

<style lang="scss">
.app-edit-info-drawer {
	.app-edit-info-form {
		display: grid;
		gap: var(--app-offset-normal);
	}
}
</style>