<script setup>
const props = defineProps({
  id: String,
  name: String,
  rows: Number,
  placeholder: String,
})
</script>

<template>
  <textarea :id="id" :name="name"
    class="px-4 py-3 flex items-center w-full appearance-none transition duration-300 ease-in-out text-heading text-sm focus:outline-none focus:ring-0 bg-white border border-gray-300 focus:shadow focus:outline-none focus:border-heading placeholder-body"
    autoComplete="off" spellCheck="false" :rows="rows" :placeholder="placeholder"></textarea>
</template>