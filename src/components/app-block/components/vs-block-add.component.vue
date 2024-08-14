<template>
	<div class="app-block-add" @click="emit('added')">
		<IconPlus />
	</div>
</template>

<script lang="ts" setup>
import IconPlus from '@/components/icons/IconPlus.vue'

const emit = defineEmits(['added'])
</script>

<style lang="scss">

</style>