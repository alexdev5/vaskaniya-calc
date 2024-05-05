<template>
  <div class="app-form-field app-form-field-file-input" :class="classes">
    <VFileInput
        v-bind="{
        ...$attrs,
        color: 'primary',
        label: label,
        id: elementId,
        density: compact ? 'compact': undefined,
        multiple: false,
      }"
        accept="image/png, image/jpeg, image/bmp"
        prepend-icon=""
        :variant="variant"
        :class="{ simple, 'details-on': detailsOn, 'variant-icon': icon }"
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
    </VFileInput>
  </div>
</template>

<script lang="ts" setup>
import { computed, useAttrs } from 'vue'

const props = defineProps({
  detailsOn: Boolean,
  classes: {
    type: [Object, String]
  },
  icon: Boolean,
  compact: Boolean,
  simple: Boolean,
  filled: Boolean,
  outlined: Boolean,
  solo: Boolean,
  soloInverted: Boolean,
  soloFilled: Boolean,
  multiple: Boolean
})

defineOptions({
  name: 'AppFileInput',
  inheritAttrs: false,
})

const elementId = computed(() => {
  const attrs = useAttrs()
  const _elementIdToken = attrs.id || attrs.label

  return _elementIdToken ? `app-file-input-${_elementIdToken}-${Math.random().toString(36).slice(2, 7)}` : undefined
})

const variant = computed(() => {
  if (props.filled) return 'filled'
  if (props.outlined) return 'outlined'
  if (props.solo) return 'solo'
  if (props.soloInverted) return 'solo-inverted'
  if (props.soloFilled) return 'solo-filled'

  return 'underlined'
})

const label = computed(() => useAttrs().label as string | undefined)

</script>

<style lang="scss">

</style>