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
      @load-media-requested="loadMedia(card.id, $event)"
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

  <AppMediaModal
    ref="mediaModal"
    :mediaList="mediaStore.state.media"
    :loading="mediaAssignment"
    @selected="assignImageToTerm"
  />
</template>

<script lang="ts" setup>
import ProductType from './components/blocks/product-type.component.vue'
import TableConfiguration from './components/blocks/table-configuration.component.vue'
import VsBlockCard from '@/components/vs-block/components/vs-block-card.component.vue'
import AppMediaModal from '@/components/media/app-media-modal.component.vue'

import { onMounted, reactive, ref } from 'vue'
import { useDimensionsStore } from './dimensions.store.ts'
import { ImageType, CommonCategoryParams } from '@/models/terms'
import { DimensionsService, TermsService } from '@/services'
import { useMediaStore } from '@/stores'

const store = useDimensionsStore()
const mediaStore = useMediaStore()

const productTypeModel = ref<number>()
const tableConfigurationCardShowing = ref(false)
const loading = ref(false)
const mediaLoading = ref(false)
const mediaAssignment = ref(false)
const mediaModal = ref()
const currentTaxSeparate = ref()

const mediaFor = reactive({
  type: ImageType.None,
  termId: 0
})

// Сделать разделение карточек дивами, если включена галочка в
// настройках блока.
// Первый просто вывести, дальше сравнить таксономии
// если они отличаются то выводить второй див.
// Только нужно подумать когда закрытый открытый тег

async function loadMedia(termId: number, mediaType: ImageType) {
  mediaFor.type = mediaType
  mediaFor.termId = termId

  mediaModal.value?.open()
  mediaLoading.value = true

  try {
    await mediaStore.loadMedia()
  } catch (error: any) {
    console.log(error)
  } finally {
    mediaLoading.value = false
  }
}

async function assignImageToTerm(mediaId: number) {
  mediaAssignment.value = true
  console.log(mediaId, mediaFor)

  try {

  } catch (error: any) {
    console.log(error)
  } finally {
    mediaAssignment.value = false
  }
}

async function saveCardSettings(formFields: CommonCategoryParams, termId: number) {
  loading.value = true

  const { imageFull, thumbnail, ...rest } = formFields

  console.log(rest)

  try {
    // await TermsService.addImages({
    //   termId,
    //   imageFull: imageFull?.[0] ?? null,
    //   thumbnail: thumbnail?.[0] ?? null,
    // })

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

function setCardDefault() {
  productTypeModel.value = store.state.productTypes[0]?.id
}

onMounted(async () => {
  await store.loadDimensions()
  setCardDefault()
})

</script>