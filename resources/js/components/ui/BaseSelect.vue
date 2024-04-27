<script setup>
const props = defineProps({
  name: String,
  // { value: String, text: String }
  options: Array,
})

console.log(props.options)
</script>

<template>
  <!-- продублирую name на случай если подумают обернуть select в div и потом name не скакал -->
  <select :name="name" class="w-1/6 outline-none focus:outline-none p-2 bg-white rounded-3xl">

    <option v-for="(option, idx) of options" :key="idx" :value="option.value">
      {{ option.text }}
    </option>
  </select>
</template>