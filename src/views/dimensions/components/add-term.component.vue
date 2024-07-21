<template>
	<AppDrawer :opened="widgetOpened" :title="title">
		drawer
	</AppDrawer>
</template>

<script lang="ts" setup>
import AppDrawer from '@/components/elements/app-drawer.component.vue'
import { ref } from 'vue'

const props = defineProps<{
	title: string
	callback?: () => Promise<void>
}>()

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

<style lang="scss">

</style>