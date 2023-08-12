<script setup>
import CloseSvg from "@/Components/CloseSvg.vue"
import {reactive, ref} from "vue";

let props = defineProps({
    tag: {
        type: String,
        required: true
    }
})

const emit = defineEmits(['remove'])

const remove = () => {
    emit('remove', props.tag)
}

</script>

<template>
    <div
        class="flex justify-center items-center m-1 font-medium py-1 px-1 bg-white rounded-full text-gray-700 bg-gray-100 border border-gray-300 ">
        <div class="text-xs font-normal leading-none max-w-full flex-initial">{{ props.tag }}</div>
        <div class="flex flex-auto flex-row-reverse">
            <div>
                <close-svg @click="remove"/>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    name: 'tag',
}

</script>
