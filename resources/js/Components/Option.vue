<script setup>
const props = defineProps({
    value: {
        type: String,
        default: ''
    }
});

</script>

<template>
  <div class="flex flex-col w-full">
    <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-gray-100">
      <div
          class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-gray-100">
        <div class="w-full items-center flex">
          <div class="mx-2 leading-6">{{ props.value }}</div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'Option'
}
</script>
