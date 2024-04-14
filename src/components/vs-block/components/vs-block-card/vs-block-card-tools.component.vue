<template>
  <div class="vs-block-card-tools">
    <v-menu :close-on-content-click="false" bottom>
      <template v-slot:activator="{ props }">
        <div class="vs-icon-btn" v-bind="props" >
          <IconSettings width="16" height="16"/>
        </div>
      </template>

      <div class="vs-block-tools-settings">
        <AppTextfield
          compact
          label="Тайтл"
          :model-value="settingsForm.title"
        />
        <AppTextfield
          compact
          label="Цена"
          :model-value="settingsForm.price"
        />
        <AppTextarea
          compact
          label="Описание"
          :model-value="settingsForm.description"
        />
        <slot name="settings" />

        <AppFormButtons />
      </div>
    </v-menu>

    <div class="vs-icon-btn" @click="emit('copied')">
      <IconCopy width="16" height="16" />
    </div>
    <div class="vs-icon-btn" @click="emit('moved')">
      <IconArrowsMove width="16" height="16" />
    </div>
    <div class="vs-icon-btn" @click="emit('hidden')">
      <IconEyeOff width="16" height="16" />
    </div>
  </div>
</template>

<script lang="ts" setup>
import IconCopy from '@/components/icons/IconCopy.vue'
import IconSettings from '@/components/icons/IconSettings.vue'
import IconArrowsMove from '@/components/icons/IconArrowsMove.vue'
import IconEyeOff from '@/components/icons/IconEyeOff.vue'
import AppTextfield from '@/components/forms/app-textfield.vue'
import AppTextarea from '@/components/forms/app-textarea.vue'
import AppFormButtons from '@/components/forms/app-form-buttons.component.vue'

import { reactive } from 'vue'
import { SettingsFormTerm } from '@/models/terms'

const emit = defineEmits([
  'settings-opened',
  'copied',
  'moved',
  'hidden'
])

const settingsForm = reactive({
  title: '',
  description: '',
  price: null,
} as SettingsFormTerm)

</script>

<style lang="scss" scoped>
.vs-block-tools-settings {
  min-width: 400px;
}
</style>