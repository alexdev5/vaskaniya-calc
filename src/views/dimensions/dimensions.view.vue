<template>
  <ProductType />
  <TableConfiguration />
</template>

<script lang="ts" setup>
import ProductType from './components/blocks/product-type.component.vue'
import TableConfiguration from './components/blocks/table-configuration.component.vue'
import { onMounted } from 'vue'
import { useDimensionsStore } from './dimensions.store.ts'

const store = useDimensionsStore()

onMounted(async () => {
  await store.loadDimensions()
})

</script>

<style lang="scss">

</style>