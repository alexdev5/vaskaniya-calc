<template>
  <div class="vs-block-card">
   <VsBlockCardTools />

    <div class="vs-block-card-image">

    </div>
    <div class="vs-block-card-title">
      {{ cardInfo.name }}
    </div>
    <div class="vs-block-card-description" v-if="cardInfo.description">
      {{ cardInfo.description }}
    </div>
    <div class="vs-block-card-price" v-if="cardInfo.acf.price">
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
    type: Object as PropType<Dimensions.ProductTypeState>,
    required: true,
  }
})
</script>

<style lang="scss">

</style>