<template>
  <!--location="end"-->
  <VMenu
    :model-value="opened"
    @update:model-value="emit('closed')"
    :close-on-content-click="false"
  >
    <template v-slot:activator="{ props }">
      <v-btn
        color="indigo"
        v-bind="props"
      >
        Menu as Popover
      </v-btn>
    </template>

  </VMenu>
</template>

<script lang="ts" setup>
defineProps({
  opened: Boolean,
})

const emit = defineEmits(['closed'])
</script>

<style lang="scss">

</style>