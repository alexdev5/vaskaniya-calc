<template>
  <div
      class="app-select flex-grow-1"
      :class="$attrs.class"
  >
    <VSelect
        v-bind="{
        ...$attrs,
        class: null,
        color: 'primary',
        label: label,
        id: elementId,
        //menuProps: { contentClass: ['app-inner-list', 'app-select__content', 'v-select__content', $attrs.multiple !== undefined ? 'v-list-select-multiple' : ''] },
      }"
        :variant="variant"
        :density="density"
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
    </VSelect>
  </div>
</template>

<script lang="ts" setup>
import { computed, useAttrs } from 'vue'

const props = defineProps({
  compact: Boolean,
  default: Boolean,
  simple: Boolean,
  filled: Boolean,
  outlined: Boolean,
  solo: Boolean,
  soloInverted: Boolean,
  soloFilled: Boolean,
})

defineOptions({
  name: 'AppSelect',
  inheritAttrs: false,
})

const elementId = computed(() => {
  const attrs = useAttrs()
  const _elementIdToken = attrs.id || attrs.label

  return _elementIdToken ? `app-select-${_elementIdToken}-${Math.random().toString(36).slice(2, 7)}` : undefined
})

const label = computed(() => useAttrs().label as string | undefined)

const variant = computed(() => {
  if (props.filled) return 'filled'
  if (props.outlined) return 'outlined'
  if (props.solo) return 'solo'
  if (props.soloInverted) return 'solo-inverted'
  if (props.soloFilled) return 'solo-filled'

  return 'underlined'
})

const density = computed(() => {
  if (props.compact) return 'compact'
  if (props.default) return 'default'

  return 'comfortable'
})
</script>
