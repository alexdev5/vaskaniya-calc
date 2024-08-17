<template>
	<AppConfirmationDialog
		ref="confirmationDialogRef"
		:loading="loading"
		@submitted="removeFigure"
	>
		<template #title>
			{{ content.dimensions.figureRemove.title }}
		</template>

		<span v-html="description"></span>
	</AppConfirmationDialog>
</template>

<script lang="ts" setup>
import AppConfirmationDialog from '@/components/modals/app-confirmation-dialog.component.vue'

import { computed, ref } from 'vue'
import { content } from '@/content'
import { postApi } from '@/services'
import { PostContracts } from '@/api'

const props = defineProps<{
	callback?: () => Promise<void>
}>()

const loading = ref(false)
const confirmationDialogRef = ref()
const figure = ref<PostContracts.PostContract>()

const description = computed(() =>
	content.dimensions.figureRemove.description
		.replace('{post_title}', `"<b>${figure.value?.title}</b>"`),
)

async function removeFigure() {
	if (!figure.value?.id) throw new Error('Cannot be removed. PostId undefined')
	loading.value = true

	try {
		await postApi.remove(figure.value.id)

		if (props.callback) await props.callback()

		close()

		console.log('Post removed')
	} catch (error) {
		console.log(error)
	} finally {
		loading.value = false
	}
}

async function open(post: PostContracts.PostContract) {
	figure.value = post
	confirmationDialogRef.value?.open()
}

function close() {
	confirmationDialogRef.value?.close()
}

defineExpose({
	open,
	close,
})
</script>

<style lang="scss">

</style>