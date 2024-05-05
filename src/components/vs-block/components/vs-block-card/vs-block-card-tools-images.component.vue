<template>
  <div class="vs-block-tools-settings-image">
    <p class="vs-label">
      {{ label }}
    </p>

    <div class="vs-block-tools-settings-image-actions">
      <AppFileInput
          hide-input
          icon
          :model-value="modelValue"
          @update:model-value="emit('update:model-value', $event)"
      >
        <template #prepend-inner>
          <AppBtn icon x-small>
            <IconCameraPlus />
          </AppBtn>
        </template>
      </AppFileInput>

      <AppBtn
          icon
          x-small
          :loading="buttonLibLoading"
          @click="emit('lib-opened')"
      >
        <IconListSearch />
      </AppBtn>
    </div>
  </div>
</template>

<script lang="ts" setup>

import AppFileInput from '@/components/forms/app-fileinput.vue'
import IconCameraPlus from '@/components/icons/IconCameraPlus.vue'
import AppBtn from '@/components/elements/app-btn.component.vue'
import IconListSearch from '@/components/icons/IconListSearch.vue'
import { PropType } from 'vue'

defineProps({
  label: String,
  modelValue: {
    type: Object as PropType<any>
  },
  buttonLibLoading: Boolean
})

const emit = defineEmits(['update:model-value', 'lib-opened'])
</script>

<style lang="scss">

</style>