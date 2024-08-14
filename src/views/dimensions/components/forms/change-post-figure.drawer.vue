<template>
	<AppDrawer :opened="widgetOpened" @closed="close">
		<template #header>
			<div class="change-figure-drawer-header">
				<p v-for="titleItem in titlePrepared">
					{{ titleItem }}
				</p>
			</div>
		</template>

		<div class="change-figure-drawer-body">
			<AppTextfield
				compact
				:label="content.dimensions.figure.form.btnLabel"
				v-model="figureFields.btnLabel"
			/>
			<AppTextarea
				compact
				:label="content.dimensions.figure.form.description"
				v-model="figureFields.description"
			/>
			<TermImageField
				:label="content.label.selectImage"
				:image="mediaModel ?? undefined"
				v-model="mediaModel"
				:deleteLoading="deletingFigure"
				:image-selected="Boolean(mediaModel)"
				@lib-opened="mediaLibraryModal?.open()"
				@removed="removeFigureImage"
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

	<AppMediaModal
		ref="mediaLibraryModal"
		:callback="callback"
		@selected="selectFigure"
	/>
</template>

<script lang="ts" setup>
import AppDrawer from '@/components/elements/app-drawer.component.vue'
import AppFormButtons from '@/components/forms/app-form-buttons.component.vue'
import TermImageField from '@/components/terms/add/components/term-image-field.component.vue'
import AppMediaModal from '@/components/media/app-media-modal.component.vue'
import AppTextarea from '@/components/forms/app-textarea.vue'
import AppTextfield from '@/components/forms/app-textfield.vue'

import { computed, ref } from 'vue'
import { content } from '@/content'
import { PostFigureContract } from '@/api/dimensions'
import { dimensionsApi, postApi } from '@/services'
import { usePostFigure } from '@/views/dimensions/components/forms/post-figure.composable.ts'
import { ImageContract } from '@/api/terms'

const props = defineProps<{
	callback?: () => Promise<void>
}>()

const { figureFields, checkFigureFields } = usePostFigure()

const currentFigure = ref<PostFigureContract>({} as PostFigureContract)

const loading = ref(false)
const deletingFigure = ref(false)
const disabled = ref(false)
const widgetOpened = ref(false)
const passedTitle = ref()
const mediaLibraryModal = ref()
const mediaModel = ref<File[] | ImageContract | null>(null)

const titlePrepared = computed(() => {
	if (!passedTitle.value?.length) return []
	return passedTitle.value.split('\n')
})

function getBaseInputs() {
	return {
		btnLabel: figureFields.value.btnLabel,
		title: currentFigure.value.title,
		notification: figureFields.value.notification, // acf
		area: figureFields.value.area, // acf
	}
}

async function submit() {
	if (!checkFigureFields()) throw new Error('Check failed `FigurePost From`')

	loading.value = true

	try {
		let postId

		if (figureFields.value.id)
			postId = await update()
		else
			postId = await create()

		if (mediaModel.value && mediaModel.value?.id !== currentFigure.value.thumbnail?.id) {
			if (mediaModel.value.id) {
				const image = mediaModel.value as ImageContract
				await postApi.assignImage(postId, image.id)
			} else {
				const image = mediaModel.value as File[]
				await postApi.uploadImage(postId, image[0])
			}
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

function selectFigure(image: ImageContract) {
	mediaModel.value = image

	mediaLibraryModal.value?.close()
}

function removeFigureImage() {
	mediaModel.value = null

	if (currentFigure.value.thumbnail)
		currentFigure.value.thumbnail = null
}

async function create() {
	if (!currentFigure.value.taxonomies.length) throw new Error('`taxonomies` empty')

	let inputs = getBaseInputs()

	return await dimensionsApi.createFigure({
		...inputs,
		taxonomy: currentFigure.value.taxonomy,
		taxonomies: currentFigure.value.taxonomies,
	})
}

async function update() {
	if (!currentFigure.value.id) throw new Error('`id` empty')

	let inputs = getBaseInputs()

	await dimensionsApi.updateFigure({
		...inputs,
		id: currentFigure.value.id,
	})

	if (!mediaModel.value && currentFigure.value.thumbnail?.id) {
		await postApi.removeImage(currentFigure.value.id)
		console.log('removed image')
	}

	return currentFigure.value.id
}

async function open(figure: PostFigureContract, title: string) {
	currentFigure.value = figure
	mediaModel.value = figure.thumbnail
	passedTitle.value = title
	widgetOpened.value = true
}

function close() {
	widgetOpened.value = false
	currentFigure.value = {} as PostFigureContract
}

defineExpose({
	open,
	close,
})
</script>

<style lang="scss">
.change-figure-drawer-body {
	display: grid;
	gap: var(--app-offset-normal);

	.v-field__input {
		border-bottom: none !important;
	}
}
</style>