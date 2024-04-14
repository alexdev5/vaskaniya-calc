<template>
  <VBtn
    class="app-btn"
    :class="{
      'v-btn-link': $attrs.to,
      success,
    }"
    v-bind="{
        ...$attrs,
        color: 'primary',
        variant: variant,
        size: size,
      }"
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
  </VBtn>
</template>

<script lang="ts" setup>
import { computed, PropType } from 'vue'

const props = defineProps({
  xSmall: Boolean,
  small: Boolean,
  large: Boolean,
  xLarge: Boolean,
  outlined: Boolean,
  shadow: Boolean,
  elevated: Boolean,
  text: Boolean,
  plain: Boolean,
  flat: Boolean,
  tooltip: String,
  success: String,
  tooltipPos: {
    type: String as PropType<'top | bottom | end | start'>,
    default: 'top'
  }
})

const size = computed(() => {
  if (props.xSmall) return 'x-small'
  if (props.small) return 'small'
  if (props.large) return 'large'
  if (props.xLarge) return 'x-large'
  return 'default'
})

const variant = computed(() => {
  if (props.outlined) return 'outlined'
  if (props.shadow) return 'default'
  if (props.text) return 'text'
  if (props.plain) return 'plain'
  if (props.elevated) return 'elevated'
  if (props.flat) return 'flat'
  return 'tonal'
})
</script>
