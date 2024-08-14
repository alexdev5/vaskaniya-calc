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
			<img :src="figure.thumbnail" alt="thumbnail">
		</div>

		<div class="post-figure-block-footer">
			<AppBtn red rounded>
				<template #prepend>+</template>
				{{ figure.acf?.btnLabel ?? content.dimensions.addFigureButton }}
			</AppBtn>
			<div class="post-figure-block-notification" v-if="figure.acf?.notification">
				{{ figure.acf?.notification }}
			</div>
		</div>
		{{ figure }}
	</div>
</template>

<script lang="ts" setup>
import AppBtn from '@/components/elements/app-btn.component.vue'
import IconTrash from '@/components/icons/IconTrash.vue'
import IconEdit from '@/components/icons/IconEdit.vue'

import { content } from '@/content'
import { PostContract } from '@/api/posts'

defineProps<{
	figure: PostContract
}>()

const emit = defineEmits(['edited', 'removed'])
</script>

<style lang="scss">
.post-figure-block {
	border-bottom: 1px solid var(--app-color-light-grey);
	padding-block: 16px;

	&:first-child {
		padding-block-start: 0;
	}

	&:last-child {
		padding-block-end: 0;
		border-bottom: none;
	}

	.post-figure-block-footer {
		display: grid;
		grid-template-columns: min-content minmax(0, 1fr);
		gap: 32px;
	}

	.post-figure-block-actions {
		display: flex;
		gap: 12px;
		padding-block-end: 16px;
	}
}
</style>