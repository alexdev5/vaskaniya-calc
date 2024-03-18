<template>
    <p class="empty-list-notification">
      <IconAlertCircle />
      {{ text ? text : `Записів не знайдено` }}
    </p>
</template>

<script lang="ts" setup>
import IconAlertCircle from '@/components/icons/IconAlertCircle.vue'

defineProps({
  text: String
})
</script>

<style lang="scss" scoped>
.empty-list-notification {
  display: flex;
  align-items: center;
  gap: var(--offset-small);
}
</style>