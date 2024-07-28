<template>
	<AppDrawer :opened="widgetOpened" @closed="close" :title="title">
		<TermSettingsForm />

		<template #footer>

		</template>
	</AppDrawer>
</template>

<script lang="ts" setup>
import AppDrawer from '@/components/elements/app-drawer.component.vue'
import TermSettingsForm from '@/components/terms/term-settings-form.component.vue'

import { ref } from 'vue'

const props = defineProps<{
	callback?: () => Promise<void>
}>()

const title = ref('')
const loading = ref(false)
const widgetOpened = ref(false)

async function submit() {
	loading.value = true

	try {

		if (props.callback) await props.callback()

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

defineExpose({
	open,
	close,
})
</script>

<style lang="scss">

</style>