<script setup>
import BaseLabel from '@/components/elements/BaseLabel.vue';
import BaseInput from '@/components/ui/BaseInput.vue';

const props = defineProps({
  id: String,
  label: String,
  name: String,
  type: String,
  placeholder: String,
  required: Boolean,
})
</script>

<template>
  <div class="w-full md:w-1/2">
    <BaseLabel :htmlFor="id">{{ label }}</BaseLabel>
    <BaseInput :id="id" :name="name" :type="type" :placeholder="placeholder" :required="required" />
  </div>
</template>