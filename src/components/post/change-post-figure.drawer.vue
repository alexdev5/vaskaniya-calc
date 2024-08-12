<template>
	<AppDrawer :opened="widgetOpened" @closed="close" :title="params?.title ?? ''">

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

import { ref } from 'vue'
import { CreateTermInDrawerParams, TermFromFields } from '@/models/terms'
import { termsApi } from '@/services'
import { content } from '@/content'

const props = defineProps<{
	callback?: () => Promise<void>
}>()

const formFields = ref<TermFromFields | null>(null)

const params = ref<CreateTermInDrawerParams | null>(null)
const loading = ref(false)
const disabled = ref(false)
const widgetOpened = ref(false)

async function submit() {
	if (!formFields.value) throw new Error('formFields is null in add-term-form-drawer')
	if (!params.value || !params.value?.taxonomy) throw new Error('params is not passed in add-term-form-drawer')

	loading.value = true

	try {

		const termId = await termsApi.create({
			parentId: params.value?.parentId,
			taxonomy: params.value!.taxonomy,
			title: formFields.value!.title,
			description: formFields.value?.description,
			price: formFields.value?.price,
		})

		if (
			formFields.value?.imageFullSize?.length ||
			formFields.value?.thumbnail?.length ||
			formFields.value?.childBlockImage?.length
		) {
			await termsApi.addImages({
				termId,
				imageFullSize: formFields.value?.imageFullSize?.[0] ?? null,
				thumbnail: formFields.value?.thumbnail?.[0] ?? null,
				childBlockImage: formFields.value?.childBlockImage?.[0] ?? null,
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

async function open(_params: CreateTermInDrawerParams) {
	params.value = _params
	widgetOpened.value = true
}

function close() {
	widgetOpened.value = false
	params.value = null
	formFields.value = null
}

function updateFields(fields: TermFromFields) {
	formFields.value = fields
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