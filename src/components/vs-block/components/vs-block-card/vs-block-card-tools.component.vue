<template>
  <div class="vs-block-card-tools">
    <div class="vs-icon-btn" @click="emit('settings-opened')">
      <IconSettings width="16" height="16"/>
    </div>
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

const emit = defineEmits(['settings-opened', 'copied', 'moved', 'hidden'])
</script>