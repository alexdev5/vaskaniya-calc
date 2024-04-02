<template>
  <ProductType>
    <VsBlockCard
      v-for="card in store.state.productTypes"
      :class="{ 'vs-block-card-active': card.id === productTypeModel }"
      :key="card.id"
      :card-info="card"
      @click="productTypeModel = card.id"
    />
  </ProductType>

  <TableConfiguration>
    <template v-for="configuration in store.state.configurations">
      <VsBlockCard
        v-if="configuration.productTypeParentId === productTypeModel"
        :key="configuration.id"
        :card-info="configuration"
      />
    </template>
  </TableConfiguration>
</template>

<script lang="ts" setup>
import ProductType from './components/blocks/product-type.component.vue'
import TableConfiguration from './components/blocks/table-configuration.component.vue'
import VsBlockCard from '@/components/vs-block/components/vs-block-card.component.vue'

import { onMounted, ref } from 'vue'
import { useDimensionsStore } from './dimensions.store.ts'

const store = useDimensionsStore()
const productTypeModel = ref<number>()

onMounted(async () => {
  await store.loadDimensions()
  productTypeModel.value = store.state.productTypes[0]?.id
  console.log(productTypeModel.value === store.state.productTypes[0]?.id)
})

</script>