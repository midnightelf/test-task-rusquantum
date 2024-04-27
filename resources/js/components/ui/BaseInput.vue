<script setup>
const props = defineProps({
  id: String,
  name: String,
  type: String,
  placeholder: String,
  required: Boolean
})
</script>

<template>
  <input :id="id" :name="name" :type="type" :placeholder="placeholder"
    class="py-2 px-4 md:px-5 w-full appearance-none transition duration-150 ease-in-out border text-input text-xs lg:text-sm font-body placeholder-body min-h-12 transition duration-200 ease-in-out bg-white border-gray-300 focus:outline-none focus:border-heading h-11 md:h-12"
    autoComplete="off" spellCheck="false" aria-invalid="false" :required="required" />
</template>
  