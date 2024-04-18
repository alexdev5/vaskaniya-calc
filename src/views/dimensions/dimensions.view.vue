<template>
  <ProductType
    @child-showing-updated="tableConfigurationCardShowing = $event"
    :settings-loading="loading"
  >
    <VsBlockCard
      v-for="card in store.state.productTypes"
      :class="{ 'vs-block-card-active': card.id === productTypeModel }"
      :key="card.id"
      :card-info="card"
      @click="productTypeModel = card.id"
      @settings-saved="saveCardSettings($event, card.id)"
    />
  </ProductType>

  <TableConfiguration
    @child-showing-updated="tableConfigurationCardShowing = $event"
    :settings-loading="loading"
  >
    <template v-for="configuration in store.state.configurations">
      <VsBlockCard
        v-if="configuration.productTypeParentId === productTypeModel || tableConfigurationCardShowing"
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
import { SettingsFormTerm } from '@/models/terms'
import { DimensionsService, TermsService } from '@/services'

const store = useDimensionsStore()
const productTypeModel = ref<number>()
const tableConfigurationCardShowing = ref(false)
const loading = ref(false)

async function saveCardSettings(formFields: SettingsFormTerm, termId: number) {
  loading.value = true

  const { imageFull, thumbnail, ...rest } = formFields

  console.log(formFields)

  try {
    await TermsService.addImages({
      termId,
      imageFull: imageFull?.[0] ?? null,
      thumbnail: thumbnail?.[0] ?? null,
    })

    await DimensionsService.updateTerm({
      ...rest,
      termId,
    })

    console.log('Saved')

    await store.loadDimensions()
  } catch (error: any) {
    console.error(error)
  } finally {
    loading.value = true
  }
}

onMounted(async () => {
  await store.loadDimensions()
  productTypeModel.value = store.state.productTypes[0]?.id
  console.log(productTypeModel.value === store.state.productTypes[0]?.id)
})

</script>