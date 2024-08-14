<template>
	<div class="app-block-figure-description">
		<p class="app-block-figure-description-title">
			{{ content.designations.title }}
		</p>
		<div class="app-block-figure-description-items">
			<div class="app-block-figure-description-item">
				<IconCircleRed />
				= {{ content.designations.frontChamfer }}
			</div>
			<div class="app-block-figure-description-item">
				<IconSquareRed />
				= {{ content.designations.sideSkirting }}
			</div>
			<div class="app-block-figure-description-item">
				<IconCircleRedFilled />
				= {{ content.designations.roundingChamfer }}
			</div>
			<div class="app-block-figure-description-item">
				<IconSquareRedFilled />
				= {{ content.designations.integratedSkirting }}
			</div>
			<div class="app-block-figure-description-item">
				<IconTriangleRed />
				= {{ content.designations.frontWithoutChamfer }}
			</div>
		</div>
	</div>
</template>

<script lang="ts" setup>
import IconCircleRed from '@/components/icons/dimensions/IconCircleRed.vue'
import IconSquareRed from '@/components/icons/dimensions/IconSquareRed.vue'
import IconTriangleRed from '@/components/icons/dimensions/IconTriangleRed.vue'
import IconCircleRedFilled from '@/components/icons/dimensions/IconCircleRedFilled.vue'
import IconSquareRedFilled from '@/components/icons/dimensions/IconSquareRedFilled.vue'

import { content } from '@/content'
</script>

<style lang="scss">
.app-block-figure-description-title {
	font-weight: 600;
	font-size: var(--app-font-size-xl);
	margin-block-end: 10px;
}

.app-block-figure-description-items {
	display: grid;
	grid-template-columns: 300px 300px;
	gap: var(--app-offset-xs);
	padding-bottom: 16px;
	border-bottom: 2px solid var(--app-color-light-grey);
}
</style>