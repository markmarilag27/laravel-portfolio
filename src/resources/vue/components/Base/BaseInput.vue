<script setup lang="ts">
  export interface Props {
    value?: string | number | null
    className?: string
    error?: string[]
  }

  export interface Emits {
    (e: 'update', value: string): void
    (e: 'clear', value: []): void
  }

  const props = defineProps<Props>()
  const emit = defineEmits<Emits>()

  const handleValue = (e: Event): void => {
    const currentTarget = e.target as HTMLInputElement
    emit('update', currentTarget.value)
    if (typeof props.error !== 'undefined') {
      emit('clear', [])
    }
  }
</script>

<template>
  <input
    :value="props.value"
    class="appearance-none w-full py-3 px-3 border-gray-600 rounded border-2"
    :class="[props.className, props.error ? 'border-red-500' : '']"
    spellcheck="true"
    v-bind="$attrs"
    @input="handleValue"
  />
  <div v-if="props.error" class="text-red-500 py-2" v-text="props.error[0]" />
</template>
