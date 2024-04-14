<template>
  <div class="app-form-buttons">
    <AppBtn success>{{ labelCansel ? labelCansel : `Отмена` }}</AppBtn>
    <AppBtn>{{ labelSuccess ? labelCansel : `Сохранить` }}</AppBtn>
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
})
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