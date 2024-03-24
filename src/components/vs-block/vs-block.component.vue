<template>
  <div class="vs-block">
    <div class="vs-block-title">
      <AppTextfield
        class="vs-color-red"
        label="Номер"
        :model-value="titleNumberModel"
        @update:model-value="emit('title-number-updated', $event)"
      />
      <AppTextfield
        label="Тайтл блока"
        :model-value="titleModel"
        @update:model-value="emit('title-updated', $event)"
      />
    </div>

    <VsBlockTools
      @settings-opened="emit('settings-opened')"
    />

    <div class="vs-block-body">
      <slot />
    </div>
  </div>
</template>

<script lang="ts" setup>
import AppTextfield from '@/components/forms/app-textfield.vue'
import VsBlockTools from '@/components/vs-block/components/vs-block-tools.component.vue'

defineProps({
  titleNumberModel: {
    type: String
  },
  titleModel: {
    type: String
  },
})
console.log(location)
const emit = defineEmits([
  'title-updated',
  'title-number-updated',
  'settings-opened',
])
</script>

<style lang="scss">

</style>