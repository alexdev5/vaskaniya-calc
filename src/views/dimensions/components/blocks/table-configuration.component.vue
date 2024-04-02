<template>
  <VsBlock
    :title-model="titleBlock"
    :title-number-model="numberBlock"
    @title-updated="titleBlock = $event"
    @title-number-updated="numberBlock = $event"
    @settings-opened="openSettings"
  >
    <slot />
  </VsBlock>
</template>

<script lang="ts" setup>
import VsBlock from '@/components/vs-block/vs-block.component.vue'
import VsBlockCard from '@/components/vs-block/components/vs-block-card.component.vue'

import { ref } from 'vue'
import { useDimensionsStore } from '@/views/dimensions/dimensions.store.ts'

const store = useDimensionsStore()

const titleBlock = ref('')
const numberBlock = ref()

function openSettings() {
  console.log('open settings')
}
</script>

<style lang="scss">

</style>