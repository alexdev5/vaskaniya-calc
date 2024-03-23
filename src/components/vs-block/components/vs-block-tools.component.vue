<template>
  <div class="vs-block-tools">
    <div class="vs-icon-btn" @click="emit('settings-opened')">
      <IconSettings />
    </div>
  </div>
</template>

<script lang="ts" setup>
import IconSettings from '@/components/icons/IconSettings.vue'

const emit = defineEmits(['settings-opened', ])
</script>

<style lang="scss">

</style>