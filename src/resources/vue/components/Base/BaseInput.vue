<script setup lang="ts">
  export interface Props {
    modelValue?: string | number | null
    className?: string
    error?: string[]
  }

  export interface Emits {
    (e: 'update:modelValue', value: string): void
    (e: 'update:clear', value: []): void
  }

  const props = defineProps<Props>()
  const emit = defineEmits<Emits>()

  const handleValue = (e: Event): void => {
    const currentTarget = e.target as HTMLInputElement
    emit('update:modelValue', currentTarget.value)
    if (typeof props.error !== 'undefined') {
      emit('update:clear', [])
    }
  }
</script>

<template>
  <input
    :modelValue="props.modelValue"
    class="appearance-none w-full py-3 px-3 border-gray-600 rounded border-2"
    :class="[
      props.className,
      props.error && props.error[0] ? 'border-red-500' : ''
    ]"
    spellcheck="true"
    v-bind="$attrs"
    @input="handleValue"
  />
  <div v-if="props.error" class="text-red-500 py-2" v-text="props.error[0]" />
</template>
