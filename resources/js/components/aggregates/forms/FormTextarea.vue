<script setup>
import BaseLabel from '@/components/elements/BaseLabel.vue';
import BaseTextarea from '@/components/ui/BaseTextarea.vue';

const props = defineProps({
  id: String,
  name: String,
  rows: Number,
  label: String,
  placeholder: String,
  required: Boolean,
})
</script>

<template>
  <div class="relative mb-4">
    <BaseLabel :htmlFor="id">{{ label }}</BaseLabel>
    <BaseTextarea :id="id" :name="name" :rows="rows" :placeholder="placeholder"></BaseTextarea>
  </div>
</template>