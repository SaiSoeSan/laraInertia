<script setup>
import { onMounted, ref } from "vue";

const model = defineModel({
  type: String,
  required: true,
});

const input = ref(null);

onMounted(() => {
  if (input.value.hasAttribute("autofocus")) {
    input.value.focus();
  }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
  <input
    class="w-full px-3 py-2 border-2 border-gray-100 rounded-md shadow-sm bg-white text-gray-900 placeholder-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-100 transition-colors duration-200 hover:border-gray-200"
    v-model="model"
    ref="input"
  />
</template>
