<template>
	<AppDrawer :opened="widgetOpened" @closed="close" :title="title">
		<TermFormFields @fields-updated="updateFields" no-select-image />

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
import TermFormFields from '@/components/terms/components/term-form-fields.component.vue'
import AppFormButtons from '@/components/forms/app-form-buttons.component.vue'

import { ref } from 'vue'
import { TermFromFields } from '@/models/terms'
import { TermsService } from '@/services'
import { content } from '@/content'

const props = defineProps<{
	callback?: () => Promise<void>
}>()

const settingsForm = ref<TermFromFields | null>(null)

const title = ref('')
const loading = ref(false)
const disabled = ref(false)
const widgetOpened = ref(false)

async function submit() {
	loading.value = true

	console.log(settingsForm.value)
	return

	try {

		await TermsService.create({
			termId,
			title: formFields.title,
			description: formFields.description,
			price: formFields.price,
		})

		if (
			formFields.imageFullSize?.length ||
			formFields.thumbnail?.length ||
			formFields.relatedImage?.length
		) {
			await TermsService.addImages({
				termId,
				imageFullSize: formFields.imageFullSize?.[0] ?? null,
				thumbnail: formFields.thumbnail?.[0] ?? null,
				childBlockImage: formFields.childBlockImage?.[0] ?? null,
			})
		}

		if (props.callback) await props.callback()

		console.log(content.notifications.updated)

		close()
	} catch (error: any) {
		console.log(error)
	} finally {
		loading.value = false
	}
}

async function open(_title: string) {
	title.value = _title
	widgetOpened.value = true
}

function close() {
	widgetOpened.value = false
}

function updateFields(fields: TermFromFields) {
	settingsForm.value = fields
	disabled.value =
		!Object.values(fields).filter(value => Boolean(value)).length || !fields.title
}

defineExpose({
	open,
	close,
})
</script>

<style lang="scss">

</style>