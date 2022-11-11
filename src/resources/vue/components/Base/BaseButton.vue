<script setup lang="ts">
  const props = defineProps({
    className: {
      type: String,
      default: 'appearance-none py-2 px-6 w-full rounded font-bold'
    }
  })
</script>

<template>
  <button type="button" v-on="$attrs" :class="props.className">
    <slot />
  </button>
</template>
