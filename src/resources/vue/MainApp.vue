<script setup lang="ts">
  import { reactive } from 'vue'
  import TopNavigation from './components/TopNavigation.vue'

  const state = reactive({
    isAuthenticated: true
  })
</script>

<template>
  <div v-if="state.isAuthenticated" class="min-h-full">
    <TopNavigation />
    <div class="container mx-auto py-8 max-w-screen-sm">
      <RouterView />
    </div>
  </div>
  <RouterView v-else />
</template>
