<template>
  <div class="app-form-buttons">
    <AppBtn
      outlined
      v-if="!submitOnly"
      @click="emit('closed')"
    >
      {{ labelCansel ? labelCansel : `Отмена` }}
    </AppBtn>
    <AppBtn
      flat
      :loading="loading"
      @click="emit('submitted')"
    >
      {{ labelSuccess ? labelCansel : `Сохранить` }}
    </AppBtn>
  </div>
</template>

<script lang="ts" setup>
import AppBtn from '@/components/elements/app-btn.component.vue'

defineProps({
  labelCansel: {
    type: String
  },
  labelSuccess: {
    type: String
  },
  loading: Boolean,
  submitOnly: Boolean,
})

const emit = defineEmits(['closed', 'submitted'])
</script>

<style lang="scss">
.app-form-buttons {
  display: flex;
  gap: 16px;
  justify-content: end;

  .app-btn {
    flex-grow: 1;
  }
}
</style>