<template>
  <div class="vs-block-card">
   <VsBlockCardTools @submitted="emit('settings-saved', $event)"/>

    <div class="vs-block-card-image">
      <img :src="cardInfo.acf?.thumbnail?.url" alt="">
    </div>
    <div class="vs-block-card-title">
      {{ cardInfo.name }}
    </div>
    <div class="vs-block-card-description" v-if="cardInfo.description">
      {{ cardInfo.description }}
    </div>
    <div class="vs-block-card-price" v-if="cardInfo.acf?.price">
      {{ cardInfo.acf.price }}
    </div>
  </div>
</template>

<script lang="ts" setup>
import { PropType } from 'vue'
import VsBlockCardTools from './vs-block-card/vs-block-card-tools.component.vue'
import { Dimensions } from '@/models'

defineProps({
  cardInfo: {
    type: Object as PropType<Dimensions.DimensionTermState>,
    required: true,
  }
})

const emit = defineEmits(['settings-saved'])
</script>

<style lang="scss">

</style>