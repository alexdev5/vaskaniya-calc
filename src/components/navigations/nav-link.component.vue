<template>
	<li class="app-navigation-item">
		<component
			class="app-navigation-item-link"
			:loading="loading"
			:is="renderedComponent"
			v-bind="customProps"
		>
			<slot name="icon-prepend" />
			<slot></slot>
			<span class="app-navigation-item-badge" v-if="badge">{{ badge }}</span>
			<slot name="append" />
		</component>
	</li>
</template>

<script lang="ts" setup>
import AppBtn from '@/components/elements/app-btn.component.vue'
import { computed } from 'vue'

const props = defineProps({
	loading: Boolean,
	to: {
		type: [String, Object],
		required: false,
	},
	badge: {
		type: Number,
	},
})

const renderedComponent = props.to ? 'RouterLink' : AppBtn

const customProps = computed(() => {
	return props.to
		? { to: props.to }
		: { text: false, block: true }
})

</script>

<style lang="scss">

</style>