<template>
  <div class="vs-container">
    <Menu />
    <div class="vs-wrapper">
      <RouterView />
    </div>
  </div>
</template>

<script setup lang="ts">
import Menu from '@/components/navigations/menu.component.vue'
</script>