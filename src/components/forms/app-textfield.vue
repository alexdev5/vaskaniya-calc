<template>
  <div class="form-field" :class="classes">
    <VTextField
        v-bind="{
        ...$attrs,
        color: 'primary',
        label: label,
        id: elementId,
        //rules: computedRules
      }"
        :variant="variant"
        :class="{ simple }"
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
    </VTextField>
  </div>
</template>

<script lang="ts" setup>
import { computed, PropType, useAttrs } from 'vue'
import { useValidationFieldRules, FormValidate } from './validation-field-rules.composable'

// TODO: set valid type `FormValidate`
const props = defineProps({
  rules: {
    type: Object as PropType<FormValidate[] | undefined>,
    default: undefined
  },
  classes: {
    type: [Object, String]
  },
  simple: Boolean,
  filled: Boolean,
  outlined: Boolean,
  solo: Boolean,
  soloInverted: Boolean,
  soloFilled: Boolean,
})

defineOptions({
  name: 'AppTextField',
  inheritAttrs: false,
})

const elementId = computed(() => {
  const attrs = useAttrs()
  const _elementIdToken = attrs.id || attrs.label

  return _elementIdToken ? `app-text-field-${_elementIdToken}-${Math.random().toString(36).slice(2, 7)}` : undefined
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
const { computedRules } = useValidationFieldRules(props?.rules)

</script>

<style lang="scss">

</style>