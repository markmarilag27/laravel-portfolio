<script setup lang="ts">
  defineProps({
    width: {
      type: String,
      default: '100%',
    },
    height: {
      type: String,
      default: '100%',
    },
  })
</script>

<template>
  <svg
    :width="width"
    :height="height"
    viewBox="0 0 512 512"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
  >
    <g clip-path="url(#clip0)">
      <path
        d="M371.84 437L371.343 228.26L268.961 400.222H232.68L130.795 232.733V437H55.251V89.1H121.849L252.063 305.295L380.289 89.1H446.39L447.384 437H371.84Z"
        fill="#FFC75A"
      />
      <path
        d="M379.84 432L379.343 223.26L276.961 395.222H240.68L138.795 227.733V432H63.251V84.1H129.849L260.063 300.295L388.289 84.1H454.39L455.384 432H379.84Z"
        fill="white"
      />
    </g>
    <defs>
      <clipPath id="clip0">
        <rect :width="width" :height="height" fill="white" />
      </clipPath>
    </defs>
  </svg>
</template>
