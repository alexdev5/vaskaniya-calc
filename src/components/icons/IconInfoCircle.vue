<script setup lang="ts">
import { defaultAttributes } from './'
</script>

<template>
	<svg
		v-bind="defaultAttributes"
		xmlns="http://www.w3.org/2000/svg"
		class="icon icon-copy"
		width="18"
		height="18"
		viewBox="0 0 24 24"
		stroke-width="1"
		stroke="currentColor"
		fill="none"
		stroke-linecap="round"
		stroke-linejoin="round"
	>
		<path stroke="none" d="M0 0h24v24H0z" fill="none" />
		<path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
		<path d="M12 9h.01" />
		<path d="M11 12h1v4h1" />
	</svg>
</template>