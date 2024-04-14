<template>
  <div class="app-form-field app-form-field-checkbox" :class="classes">
    <v-checkbox
        v-bind="{
        ...$attrs,
        //color: 'primary',
        label: label,
        id: elementId,
        //rules: computedRules
      }"
        density="compact"
        :variant="variant"
        :class="{ simple, 'details-on': detailsOn }"
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
    </v-checkbox>
  </div>
</template>

<script lang="ts" setup>
import { computed, useAttrs } from 'vue'

const props = defineProps({
  classes: {
    type: [Object, String]
  },
  simple: Boolean,
  filled: Boolean,
  outlined: Boolean,
  solo: Boolean,
  soloInverted: Boolean,
  soloFilled: Boolean,
  detailsOn: Boolean,
})

defineOptions({
  name: 'AppCheckbox',
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

</script>

<style lang="scss">

</style>