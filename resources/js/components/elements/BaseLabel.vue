<script setup>
const props = defineProps({
  htmlFor: String,
})
</script>

<template>
  <label :htmlFor="htmlFor" class="block text-gray-600 font-semibold text-sm leading-none mb-3 cursor-pointer">
    <slot></slot>
  </label>
</template>