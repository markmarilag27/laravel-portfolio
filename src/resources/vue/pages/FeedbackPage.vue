<script setup lang="ts"></script>

<template>
  <div v-if="$route.name === 'feedbacks'">
    <div class="flex justify-between justify-items-center mb-8">
      <h1 class="text-2xl">Feedbacks</h1>

      <button
        type="button"
        class="bg-gray-500 rounded-sm text-sm py-2 px-4 text-white outline-none"
      >
        Create New Feedback
      </button>
    </div>

    <table class="table-auto w-full">
      <thead>
        <tr>
          <th
            class="font-bold text-gray-500 text-xs text-left bg-slate-100 py-2 px-4 border"
          >
            Name
          </th>
          <th
            class="font-bold text-gray-500 text-xs text-center bg-slate-100 py-2 px-4 border"
          >
            Reviews
          </th>
          <th
            class="font-bold text-gray-500 text-xs text-center bg-slate-100 py-2 px-4 border"
          >
            Created At
          </th>
        </tr>
      </thead>
      <tbody>
        <tr class="cursor-pointer hover:bg-slate-50">
          <td
            class="font-normal text-gray-700 text-sm text-left border py-2 px-4"
          >
            <div class="truncate max-w-xs">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel
              excepturi ut accusamus rerum? Corporis obcaecati sed ratione?
              Soluta suscipit consectetur architecto? Pariatur soluta labore
              libero alias veniam earum saepe fuga.
            </div>
          </td>
          <td
            class="font-normal text-gray-700 text-sm text-center border py-2 px-4"
          >
            6
          </td>
          <td
            class="font-normal text-gray-700 text-sm text-center border py-2 px-4"
          >
            2 days ago
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <RouterView v-else />
</template>
