<script setup lang="ts">
  import { reactive } from 'vue'
  import SidebarNavigation from './components/SidebarNavigation.vue'

  const state = reactive({
    isAuthenticated: true
  })
</script>

<template>
  <div v-if="!state.isAuthenticated" class="flex min-h-full">
    <SidebarNavigation />
    <div class="p-8 w-full bg-slate-50">
      <RouterView />
    </div>
  </div>
  <RouterView v-else />
</template>
