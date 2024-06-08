<template>
  <DimensionsProductType
    @child-showing-updated="tableConfigurationCardShowing = $event"
    :settings-loading="loading"
  >
    <VsBlockCard
      v-for="card in store.state.productTypes"
      :class="{ 'vs-block-card-active': card.id === productTypeModel }"
      :key="card.id"
			:record="card"
			:deleteLoading="deleteLoading"
      @click="productTypeModel = card.id"
      @settings-saved="saveCardSettings($event, card.id)"
      @load-media-requested="loadMedia(card.id, $event)"
      @removed="remove(card.id, $event)"
    />
  </DimensionsProductType>

  <DimensionsTableConfiguration
    @child-showing-updated="tableConfigurationCardShowing = $event"
    :settings-loading="loading"
  >
    <template v-for="configuration in store.state.configurations">
      <VsBlockCard
        v-if="configuration.productTypeParentId === productTypeModel || tableConfigurationCardShowing"
				:record="configuration"
        :key="configuration.id"
        :card-info="configuration"
      />
    </template>
  </DimensionsTableConfiguration>

  <AppMediaModal
    ref="mediaModal"
    :loading="mediaAssignment"
    @selected="assignImageToTerm"
  />
</template>

<script lang="ts" setup>
import DimensionsProductType from './components/blocks/dimensions-product-type.component.vue'
import DimensionsTableConfiguration from './components/blocks/dimensions-table-configuration.component.vue'
import VsBlockCard from '@/components/vs-block/components/vs-block-card.component.vue'
import AppMediaModal from '@/components/media/app-media-modal.component.vue'

import { onMounted, reactive, ref } from 'vue'
import { useDimensionsStore } from './dimensions.store.ts'
import { ImageType, CommonCategoryParams } from '@/models/terms'
import { DimensionsService, TermsService } from '@/services'
import { useMediaStore } from '@/stores'

const store = useDimensionsStore()

const productTypeModel = ref<number>()
const tableConfigurationCardShowing = ref(false)
const loading = ref(false)
const deleteLoading = ref({} as Record<ImageType, boolean>)
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
}

async function assignImageToTerm(mediaId: number) {
  mediaAssignment.value = true

  try {
    await TermsService.assignImage({
      termId: mediaFor.termId,
      imageId: mediaId,
      type: mediaFor.type,
    })
    await store.loadDimensions()
    mediaModal.value?.close()
    console.log('Изображение выбрано успешно')
  } catch (error: any) {
    console.log(error)
  } finally {
    mediaAssignment.value = false
  }
}

async function remove(termId: number, mediaType: ImageType) {
	deleteLoading.value[mediaType] = true

	console.log(deleteLoading.value)
	try {
		await TermsService.assignImage({
			termId,
			imageId: null,
			type: mediaType,
		})
		await store.loadDimensions()
	} catch (error: any) {
		console.log(error)
	} finally {
		deleteLoading.value[mediaType] = false
	}
}

async function saveCardSettings(formFields: CommonCategoryParams, termId: number) {
  loading.value = true

	console.log(formFields)
  try {
		if (
			formFields.imageFullSize?.length ||
			formFields.thumbnail?.length ||
			formFields.relatedImage?.length
		) {
			await TermsService.addImages({
				termId,
				imageFullSize: formFields.imageFullSize?.[0] ?? null,
				thumbnail: formFields.thumbnail?.[0] ?? null,
				childBlockImage: formFields.childBlockImage?.[0] ?? null,
			})
		}

    await DimensionsService.updateTerm({
      termId,
      title: formFields.title,
      description: formFields.description,
      price: formFields.price,
    })

    await store.loadDimensions()
		console.log('Дані оновлено')
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