import { defineStore } from 'pinia'
import { computed, reactive, ref, watch } from 'vue'
import { dimensionsApi, termsApi } from '@/services'
import { ImageType, TermState } from '@/models/terms'
import { PostContracts, TermContracts } from '@/api'

export const useDimensionsStore = defineStore('dimensions', () => {
    const state = reactive({
        taxonomy: '' as TermContracts.TaxonomyName,
        parentTerm: null as TermState | null,
        productTypes: [] as TermState[],
        configurations: [] as TermState[],
        figures: [] as PostContracts.PostContract[],

        loading: false,
        selectedProductTypeId: 0 as number,
        selectedConfigurationId: 0 as number,
    })

    const setting = reactive({
        showAllConfigurations: false,
        showHiddenFields: false,
    })

    const termImageToUpload = reactive({
        type: ImageType.None,
        termId: 0,
        loading: false,
    })

    const selectedProductType = computed((): TermState | null => {
        if (!state.productTypes?.length) return null

        return (
            state.productTypes.find(
                (item) => item.id === state.selectedProductTypeId
            ) ?? null
        )
    })

    const selectedConfiguration = computed((): TermState | null => {
        if (!state.configurations?.length) return null

        return (
            state.configurations.find(
                (item) => item.id === state.selectedConfigurationId
            ) ?? null
        )
    })

    const imageDeleting = ref({} as Record<ImageType, boolean>)

    async function loadDimensions() {
        state.loading = true

        try {
            const result = await dimensionsApi.dimensions()

            state.taxonomy = result.taxonomy
            state.parentTerm = new TermState(result.parentTerm)

            state.productTypes = (result.productTypes ?? []).map(
                (productType) => new TermState(productType)
            )
            state.configurations = (result.configurations ?? []).map(
                (configuration) => new TermState(configuration)
            )

            state.figures = result.figures
        } catch (error: any) {
            console.log(error)
        } finally {
            state.loading = false
        }
    }

    async function removeImageFromTerm(termId: number, mediaType: ImageType) {
        imageDeleting.value[mediaType] = true

        try {
            await termsApi.assignImage({
                termId,
                imageId: null,
                type: mediaType,
            })
            await loadDimensions()
        } catch (error: any) {
            console.log(error)
        } finally {
            imageDeleting.value[mediaType] = false
        }
    }

    function setCardDefault() {
        state.selectedProductTypeId = state.productTypes?.[0]?.id ?? 0

        // watch fix
        setTimeout(() => {
            if (state.selectedProductTypeId && state.configurations?.length) {
                state.selectedConfigurationId =
                    state.configurations.find(
                        (item) =>
                            item.productTypeParentId ===
                            state.selectedProductTypeId
                    )?.id ?? 0
            }
        }, 100)
    }

    watch(
        () => state.selectedProductTypeId,
        () => {
            state.selectedConfigurationId = 0
        }
    )
    return {
        state,
        setting,
        loadDimensions,
        termImageToUpload,
        removeImageFromTerm,
        imageDeleting,
        setCardDefault,
        selectedProductType,
        selectedConfiguration,
    }
})
