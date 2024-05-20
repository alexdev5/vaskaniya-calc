<template>
  <div class="vs-block-card">
   <VsBlockCardTools
		 :record="record"
		 :deleteLoading="deleteLoading"
     @submitted="emit('settings-saved', $event)"
     @load-media-requested="emit('load-media-requested', $event)"
		 @removed="emit('removed', $event)"
   />

    <div class="vs-block-card-image">
      <img :src="record.acf?.thumbnail?.url" alt="">
    </div>
    <div class="vs-block-card-title">
      {{ record.title }}
    </div>
    <div class="vs-block-card-description" v-if="record.description">
      {{ record.description }}
    </div>
    <div class="vs-block-card-price" v-if="record.acf?.price">
      {{ record.acf.price }}
    </div>
  </div>
</template>

<script lang="ts" setup>
import { PropType } from 'vue'
import VsBlockCardTools from './vs-block-card/vs-block-card-tools.component.vue'
import { Dimensions } from '@/models'
import { ImageType } from '@/models/terms'

defineProps({
	record: {
    type: Object as PropType<Dimensions.DimensionTermState>,
    required: true,
  },
	deleteLoading: Object as PropType<Record<ImageType, boolean>>
})

const emit = defineEmits(['settings-saved', 'load-media-requested', 'removed'])
</script>

<style lang="scss">

</style>