<script setup>
const props = defineProps({
  abbreviation: {
    required: true,
    type: String
  }
})
</script>

<template>
  <div class="flex items-center w-2/12">
    <div :class="{'ct': props.abbreviation === 'CT', 'pt': props.abbreviation === 'PT'}" class="w-6 h-6 mx-24 mt-3 mb-6"></div>
    <span class="relative right-20 text-xl bottom-1.5">{{ props.abbreviation }}</span>
  </div>
</template>
<script>
export default {
  name: 'abbreviation'
}
</script>
<style scoped>

.ct {
  background-color: rgb(86, 189, 137);
}

.pt {
  background-color: rgb(110, 133, 183);
}

</style>
