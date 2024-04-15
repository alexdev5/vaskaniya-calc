<template>
  <div class="vs-block-card-tools">
    <v-menu v-model="menuModel" :close-on-content-click="false" bottom>
      <template v-slot:activator="{ props }">
        <div class="vs-icon-btn" v-bind="props">
          <IconSettings width="16" height="16" />
        </div>
      </template>

      <div class="vs-block-tools-settings">
        <AppTextField
          compact
          label="Тайтл"
          v-model="settingsForm.title"
        />
        <AppTextField
          compact
          label="Цена"
          v-model="settingsForm.price"
        />
        <AppTextarea
          compact
          label="Описание"
          v-model="settingsForm.description"
        />
        <AppFileInput
          v-model="settingsForm.thumbnail"
          label="Превью"
        />
        <AppFileInput
          v-model="settingsForm.imageFull"
          label="Полноразмерное изображение"
        />

        <slot name="settings" />

        <AppFormButtons
          submit-only
          @closed="menuModel = false"
          @submitted="emit('submitted', settingsForm)"
        />
      </div>
    </v-menu>

    <div class="vs-icon-btn" @click.stop.prevent="emit('copied')">
      <IconCopy width="16" height="16" />
    </div>
    <div class="vs-icon-btn" @click.stop.prevent="emit('moved')">
      <IconArrowsMove width="16" height="16" />
    </div>
    <div class="vs-icon-btn" @click.stop.prevent="emit('hidden')">
      <IconEyeOff width="16" height="16" />
    </div>
  </div>
</template>

<script lang="ts" setup>
import IconCopy from '@/components/icons/IconCopy.vue'
import IconSettings from '@/components/icons/IconSettings.vue'
import IconArrowsMove from '@/components/icons/IconArrowsMove.vue'
import IconEyeOff from '@/components/icons/IconEyeOff.vue'
import AppTextField from '@/components/forms/app-textfield.vue'
import AppFileInput from '@/components/forms/app-fileinput.vue'
import AppTextarea from '@/components/forms/app-textarea.vue'
import AppFormButtons from '@/components/forms/app-form-buttons.component.vue'

import { reactive, ref } from 'vue'
import { SettingsFormTerm } from '@/models/terms'

const emit = defineEmits([
  'settings-opened',
  'copied',
  'moved',
  'hidden',
  'submitted'
])

const settingsForm = reactive({
  title: '',
  description: '',
  price: null,
  thumbnail: null,
  imageFull: null
} as SettingsFormTerm)

const menuModel = ref(false)
</script>

<style lang="scss" scoped>
.vs-block-tools-settings {
  min-width: 400px;
}
</style>