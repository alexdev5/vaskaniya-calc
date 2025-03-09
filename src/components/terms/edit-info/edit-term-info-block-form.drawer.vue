<template>
  <AppDrawer
    class="app-edit-info-drawer"
    :opened="widgetOpened"
    @closed="close"
    :title="drawerTitle ?? content.common.editBlockInfo.title"
  >
    <div class="app-edit-info-form" v-if="formFields">
      <AppTextfield
        class="app-color-red"
        :label="content.common.label.number"
        v-model="formFields.number"
      />
      <AppTextfield
        :label="content.common.label.blockTitle"
        v-model="formFields.title"
      />
      <AppTextfield
        :label="content.common.label.blockInfo"
        v-model="formFields.info"
      />
    </div>

    <template #footer>
      <AppFormButtons
        :disabled="disabled"
        :loading="loading"
        @closed="close()"
        @submitted="submit"
      />
    </template>
  </AppDrawer>
</template>

<script lang="ts" setup>
import AppDrawer from "@/components/elements/app-drawer.component.vue";
import AppFormButtons from "@/components/forms/app-form-buttons.component.vue";
import AppTextfield from "@/components/forms/app-textfield.vue";

import { ref } from "vue";
import { content } from "@/content";
import { termsApi } from "@/services";
import { UpdateTermInfoBlockCommand } from "@/api/terms/term.contracts.ts";

const props = defineProps<{
  callback?: () => Promise<void>;
}>();

const formFields = ref<UpdateTermInfoBlockCommand | null>(null);

const drawerTitle = ref<string | undefined>("");
const loading = ref(false);
const disabled = ref(false);
const widgetOpened = ref(false);

async function submit() {
  loading.value = true;

  if (!formFields.value)
    if (!formFields.value)
      throw new Error("formFields is null in edit-info-block-form");

  try {
    await termsApi.updateInfoBlock({
      id: formFields.value.id,
      taxonomy: formFields.value.taxonomy,
      title: formFields.value.title,
      number: formFields.value.number,
      info: formFields.value.info,
    });

    if (props.callback) await props.callback();

    console.log("update success");
    close();
  } catch (error: any) {
    console.error("editBlockInfo.drawer", error);
  } finally {
    loading.value = false;
  }
}

async function open(fields: UpdateTermInfoBlockCommand, title?: string) {
  formFields.value = fields;
  drawerTitle.value = title;
  widgetOpened.value = true;
}

function close() {
  widgetOpened.value = false;
  formFields.value = null;
}

defineExpose({
  open,
  close,
});
</script>

<style lang="scss">
.app-edit-info-drawer {
  .app-edit-info-form {
    display: grid;
    gap: var(--app-offset-normal);
  }
}
</style>
