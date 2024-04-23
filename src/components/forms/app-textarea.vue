<template>
  <div
    class="app-form-textarea app-form-field"
    :class="$attrs.class"
  >
    <!-- class="mb-1 text-body-2 text-high-emphasis" -->
    <VLabel
      v-if="label"
      :for="elementId"
      class="mb-1"
      :text="label"
    />
    <VTextarea
      @update:model-value="emit('update:model-value', $event)"

      v-bind="{
        ...$attrs,
        class: null,
        label: undefined,
        rows: 3,
        autoGrow: true,
        id: elementId,
      }"
      :variant="variant"
      :class="{'with-details': withDetails}"
    >
      <template
        v-for="(_, name) in $slots"
        #[name]="slotProps"
      >
        <slot
          :name="name"
          v-bind="slotProps || {}"
        />
      </template>
    </VTextarea>
  </div>
</template>

<script lang="ts" setup>
import { computed, useAttrs } from 'vue'

const props = defineProps({
  withDetails: Boolean,

  filled: Boolean,
  underlined: Boolean,
  solo: Boolean,
  soloInverted: Boolean,
  soloFilled: Boolean,
})

defineOptions({
  name: 'AppTextarea',
  inheritAttrs: false,
})
const emit = defineEmits(['update:model-value'])

const elementId = computed (() => {
  const attrs = useAttrs()
  const _elementIdToken = attrs.id || attrs.label

  return _elementIdToken ? `app-textarea-${_elementIdToken}-${Math.random().toString(36).slice(2, 7)}` : undefined
})

const label = computed(() => useAttrs().label as string | undefined)

const variant = computed(() => {
  if (props.filled) return 'filled'
  if (props.underlined) return 'underlined'
  if (props.solo) return 'solo'
  if (props.soloInverted) return 'solo-inverted'
  if (props.soloFilled) return 'solo-filled'

  return 'outlined'
})

</script>
