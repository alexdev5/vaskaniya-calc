<template>
  <div class="vs-block">
    <div class="vs-block-title">
      <AppTextfield v-model="typeProductNumber" class="vs-color-red"/>
      <AppTextfield number v-model="typeProduct" />
    </div>
    <div class="vs-block-settings">
      <div class="vs-block-settings-tools">
        <div class="vs-icon-btn">
          <IconSettings />
        </div>
      </div>

      <div class="vs-block-settings-card">
        <div class="vs-block-settings-card-tools">

        </div>

        <div class="vs-block-settings-card-image">

        </div>
        <div class="vs-block-settings-card-title">

        </div>
        <div class="vs-block-settings-card-description">

        </div>
        <div class="vs-block-settings-card-price">

        </div>
      </div>
    </div>
  </div>

</template>

<script lang="ts" setup>
import AppTextfield from '@/components/forms/app-textfield.vue'
import AppBtn from '@/components/elements/app-btn.component.vue'
import IconSettings from '@/components/icons/IconSettings.vue'

import { ref } from 'vue'

const typeProduct = ref('')
const typeProductNumber = ref()
</script>

<style lang="scss">
.vs-block-title {
  display: grid;
  grid-template-columns: 100px minmax(0, 1fr);
  width: 100%;
  gap: 32px;
}
.vs-block-settings {
  @include boxShadow;
  border: 1px solid red;
}
.vs-icon-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 2px;
  border-radius: 50%;
  cursor: pointer;
  background: var(--vs-color-grey);
  @include trans;

  &:hover {
    background: rgba(var(--vs-color-red-rgb), .3);
  }
}
</style>