<script setup lang="ts">
import { defaultAttributes } from './'
</script>

<template>
  <svg
      v-bind="defaultAttributes"
      xmlns="http://www.w3.org/2000/svg"
      class="icon icon-address-book"
      width="18"
      height="18"
      viewBox="0 0 24 24"
      stroke-width="1.5"
      stroke="currentColor"
      fill="none"
      stroke-linecap="round"
      stroke-linejoin="round"
  >
    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
    <path d="M18 6l-12 12" />
    <path d="M6 6l12 12" />
  </svg>
</template>

