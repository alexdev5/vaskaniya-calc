<template>
  <AppModal ref="mediaModal" @closed="close">
    <template #header-fixed>
      <div>
        <p v-if="mediaSelected.title">
          <span>
            <b>image:</b> {{ mediaSelected.fullName }} <b>|</b> {{ mediaSelected.id }}
          </span>
        </p>
        <p v-else>Изображение не выбрано</p>
      </div>
    </template>

    <div class="app-media-list">
      <div
        v-for="media in mediaStore.state.media"
        class="app-media-list-item"
        :class="{ 'active': mediaSelected.id === media.id }"
        @click="mediaSelected = media"
      >
        <div class="app-media-list-item-img">
          <img :src="media.url" alt="">
        </div>

        <div class="app-media-list-item-description">
          <p><b>ID:</b> {{ media.id }}</p>
          <p><b>Name:</b> {{ media.fullName }}</p>
          <!--<p><b>url:</b> {{ media.url }}</p>-->
        </div>
      </div>
    </div>

    <template #actions>
      <AppBtn
        flat
        :disabled="!mediaSelected.id"
        :loading="loading"
        @click="emit('selected', mediaSelected.id)"
      >
        Выбрать
      </AppBtn>
      <AppBtn
        outlined
        @click="close()"
      >
        Закрыть
      </AppBtn>
    </template>
  </AppModal>
</template>

<script lang="ts" setup>
import AppModal from '@/components/elements/app-modal.component.vue'
import AppBtn from '@/components/elements/app-btn.component.vue'
import { ref } from 'vue'
import { PropType } from 'vue'
import { Media } from '@/models/terms/terms.contracts.ts'
import { ImageType } from '@/models/terms'
import { useMediaStore } from '@/stores'

defineProps({
  loading: Boolean,
})

const emit = defineEmits(['selected'])

const mediaStore = useMediaStore()

const mediaModal = ref()
const mediaSelected = ref({} as Media)
const mediaLoading = ref(false)

async function open() {
  mediaModal.value?.open()
  await loadMedia()
}

function close() {
  mediaSelected.value = {} as Media
  mediaModal.value?.close()
}

async function loadMedia() {
  mediaLoading.value = true

  try {
    await mediaStore.loadMedia()
  } catch (error: any) {
    console.log(error)
  } finally {
    mediaLoading.value = false
  }
}

defineExpose({
  open,
  close,
})
</script>

<style lang="scss">

</style>