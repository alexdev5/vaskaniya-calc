<template>
	<div class="post-figure-block">
		<div class="post-figure-block-actions">
			<button class="vs-icon-btn" @click="emit('edited')">
				<IconEdit />
			</button>
			<button class="vs-icon-btn" @click="emit('removed')">
				<IconTrash />
			</button>
		</div>

		<div class="post-figure-block-image" v-if="figure.thumbnail">
			<img :src="figure.thumbnail.url" alt="thumbnail">
		</div>

		<div class="post-figure-block-footer">
			<AppBtn red rounded>
				<template #prepend>+</template>
				{{ figure.acf?.btnLabel ?? content.dimensions.addFigureButton }}
			</AppBtn>
			<div class="post-figure-block-notification" v-html="figure.acf?.notification" v-if="figure.acf?.notification" />
		</div>
	</div>
</template>

<script lang="ts" setup>
import AppBtn from '@/components/elements/app-btn.component.vue'
import IconTrash from '@/components/icons/IconTrash.vue'
import IconEdit from '@/components/icons/IconEdit.vue'

import { content } from '@/content'
import { PostContracts } from '@/api'

defineProps<{
	figure: PostContracts.PostContract
}>()

const emit = defineEmits(['edited', 'removed'])
</script>

<style lang="scss">
.post-figure-block {
	border-bottom: 1px solid var(--app-color-light-grey);
	padding-block: 16px;
	display: grid;
	gap: var(--app-offset-normal);

	&:first-child {
		padding-block-start: 0;
	}

	&:last-child {
		padding-block-end: 0;
		border-bottom: none;
	}

	.post-figure-block-actions {
		display: flex;
		gap: 12px;
	}

	.post-figure-block-image {
		max-height: 600px;
		display: flex;
		justify-content: center;

		img {
			object-fit: contain;
		}
	}

	.post-figure-block-footer {
		display: grid;
		grid-template-columns: minmax(150px, min-content) minmax(0, 1fr);
		gap: 32px;
		align-items: center;
	}
}

.post-figure-block-notification {
	background: var(--app-color-dark-grey);
	color: #fff;
	border-radius: 6px;
	padding: 6px 16px;

	span {
		color: var(--app-color-red);
	}
}
</style>