<template>
    <VsBlock
        :info="blockInfo"
        @edit-info-requested="editTermChildInfoBlock"
        v-if="store.state.parentTerm"
    >
        <template #prepend>
            <DesignationsDescription />
        </template>

        <template v-if="store.state.selectedConfigurationId">
            <div
                class="post-figure-block-wrapper"
                v-if="figureSelected?.length"
            >
                <FigureBlock
                    v-for="figure in figureSelected"
                    :figure="figure"
                    @edited="changePostFigureRef?.open(figure, drawerTitle)"
                    @removed="confirmationRemovingRef?.open(figure)"
                />
            </div>

            <VsBlockAdd @added="createFigure" v-else />
        </template>
    </VsBlock>

    <EditLastChildInfo
        ref="editLastChildInfoRef"
        :callback="store.loadDimensions"
    />
    <ChangePostFigure
        ref="changePostFigureRef"
        :callback="store.loadDimensions"
    />
    <FigureRemovingConfirmation
        ref="confirmationRemovingRef"
        :callback="store.loadDimensions"
    />
</template>

<script lang="ts" setup>
import VsBlock, {
    BlockInfo,
} from '@/components/app-block/vs-block.component.vue'
import DesignationsDescription from '@/components/figure/designations-description.component.vue'
import EditLastChildInfo from '@/components/terms/edit-last-child-info/edit-last-child-info.drawer.vue'
import VsBlockAdd from '@/components/app-block/components/vs-block-add.component.vue'
import ChangePostFigure from '../forms/change-post-figure.drawer.vue'
import FigureBlock from './components/figure-block.componet.vue'
import FigureRemovingConfirmation from './components/figure-removing-confirmation.component.vue'

import { computed, ref } from 'vue'
import { useDimensionsStore } from '@/views/dimensions/dimensions.store.ts'
import { content } from '@/content'

const emit = defineEmits(['edit-info-requested'])
const store = useDimensionsStore()

const editLastChildInfoRef = ref()
const changePostFigureRef = ref()
const confirmationRemovingRef = ref()

const blockInfo = computed(
    () =>
        ({
            number: store.selectedProductType?.acf.lastChildBlockNumber,
            title: store.selectedProductType?.acf.lastChildBlockTitle,
            info: store.selectedProductType?.acf.lastChildBlockInfo,
        }) as BlockInfo
)

function editTermChildInfoBlock() {
    if (!store.selectedProductType) {
        console.error(
            'store.state.selectedProductTypeId: ',
            store.state.selectedProductTypeId
        )
        return
    }

    editLastChildInfoRef.value?.open({
        id: store.state.selectedProductTypeId,
        taxonomy: store.state.taxonomy,
        childNumber: store.selectedProductType.acf.lastChildBlockNumber,
        childTitle: store.selectedProductType.acf.lastChildBlockTitle,
        childInfo: store.selectedProductType.acf.lastChildBlockInfo,
    })
}

const drawerTitle = computed(
    () =>
        `${content.common.chapter}: ${store.selectedProductType?.title}\n
	${content.common.type}: ${store.selectedConfiguration?.title}`
)

function createFigure() {
    changePostFigureRef.value?.open(
        {
            taxonomies: [
                store.state.selectedProductTypeId,
                store.state.selectedConfigurationId,
            ],
            title: store.selectedConfiguration?.title,
            taxonomy: store.state.taxonomy,
        },
        drawerTitle.value,
        store.state.taxonomy
    )
}

const figureSelected = computed(() => {
    if (!store.state.figures?.length) return null

    return store.state.figures.filter((figure) =>
        figure.taxonomies.includes(store.state.selectedConfigurationId)
    )
})
</script>

<style lang="scss"></style>
