<template>
  <AppModal ref="mediaModal" @closed="close">
    <div class="app-media-list">
      <div
        v-for="media in mediaList"
        class="app-media-list-item"
        :class="{ 'active': mediaSelected === media.id }"
        @click="mediaSelected = media.id"
      >
        <div class="app-media-list-item-img">
          <img :src="media.url" alt="">
        </div>

        <div class="app-media-list-item-description">
          <p><b>ID:</b> {{ media.id }}</p>
          <p><b>Name:</b> {{ media.title }}</p>
          <p><b>url:</b> {{ media.url }}</p>
        </div>
      </div>
    </div>

    <template #actions>
      <AppBtn
        flat
        :disabled="!mediaSelected"
        :loading="loading"
        @click="emit('selected', mediaSelected)"
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

defineProps({
  mediaList: {
    type: Array as PropType<Media[]>,
    required: true,
  },
  loading: Boolean,
})

const emit = defineEmits(['selected'])

const mediaModal = ref()
const mediaSelected = ref()

function open() {
  mediaModal.value?.open()
}

function close() {
  mediaSelected.value = null
  mediaModal.value?.close()
}

defineExpose({
  open,
  close,
})
</script>

<style lang="scss">

</style>