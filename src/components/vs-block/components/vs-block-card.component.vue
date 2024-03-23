<template>
  <div class="vs-block-card">
   <VsBlockCardTools />

    <div class="vs-block-card-image">

    </div>
    <div class="vs-block-card-title">

    </div>
    <div class="vs-block-card-description">

    </div>
    <div class="vs-block-card-price">

    </div>
  </div>
</template>

<script lang="ts" setup>
import { PropType } from 'vue'
import VsBlockCardTools from './vs-block-card/vs-block-card-tools.component.vue'

defineProps({
  cardInfo: {
    type: Object as PropType<any>,
    required: true,
  }
})
</script>

<style lang="scss">

</style>