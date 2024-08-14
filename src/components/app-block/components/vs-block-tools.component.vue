<template>
	<div class="app-block-tools">
		<v-menu :close-on-content-click="false" bottom>
			<template v-slot:activator="{ props }">
				<div class="vs-icon-btn" v-bind="props">
					<IconSettings />
				</div>
			</template>

			<div class="app-block-tools-settings">
				<slot name="settings" />
			</div>
		</v-menu>
	</div>
</template>

<script lang="ts" setup>
import IconSettings from '@/components/icons/IconSettings.vue'
</script>

<style lang="scss">

</style>