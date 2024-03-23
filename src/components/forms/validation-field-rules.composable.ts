import { computed } from 'vue'

export enum FormValidate {
    Required = 'required',
    Email = 'email',
    Phone = 'phone',
}

export type RuleFunction = (value: string) => boolean | string

export function useValidationFieldRules(rules: FormValidate[] | undefined) {
    const formValidationRules: Record<string, RuleFunction> = {
        [FormValidate.Required]: (value: string) => !!value || 'required',
        [FormValidate.Email]: (value: string) => {
            if(!value) return true
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value) || 'email wrong'
        },
    }

    const computedRules = computed(() => {
        if(!rules?.length) return undefined

        const existRules = rules.filter(stringRule => !!formValidationRules[stringRule])

        if(!existRules.length) return undefined

        return existRules.map(stringRule => formValidationRules[stringRule])
    })

    return {
        computedRules,
        formValidationRules,
    }
}