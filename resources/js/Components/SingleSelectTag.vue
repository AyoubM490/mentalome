<script setup>
const props = defineProps({
    title: {
        type: String,
        required: true
    }
})
</script>

<template>
  <div class="cursor-pointer group">
    <a class="block p-2 border-transparent border-l-4 group-hover:border-blue-600 group-hover:bg-gray-100">{{ props.title }}</a>
  </div>
</template>
<script>
export default {
  name: 'single-select-tag'
}
</script>
