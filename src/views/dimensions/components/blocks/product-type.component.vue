<template>
  <VsBlock
    :title-model="titleBlock"
    :title-number-model="numberBlock"
    @title-updated="titleBlock = $event"
    @title-number-updated="numberBlock = $event"
  >
    <slot />

    <template #settings>
      <AppCheckbox
        :modelValue="childBlockShowing"
        @update:modelValue="updateChildShowing"
        label="Отобразить дочерние блоки"
      />
    </template>
  </VsBlock>

</template>

<script lang="ts" setup>
import VsBlock from '@/components/vs-block/vs-block.component.vue'

import { ref } from 'vue'
import { useDimensionsStore } from '@/views/dimensions/dimensions.store.ts'
import AppCheckbox from '@/components/forms/app-checkbox.vue'

defineProps({
  settingsLoading: Boolean
})

const emit = defineEmits(['child-showing-updated'])
const store = useDimensionsStore()

const titleBlock = ref('')
const numberBlock = ref()
const childBlockShowing = ref(false)

function updateChildShowing(value: boolean) {
  childBlockShowing.value = value
  emit('child-showing-updated', value)
}
</script>

<style lang="scss">

</style>