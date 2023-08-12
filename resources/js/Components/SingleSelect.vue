<script setup>
import ChevronUp from "@/Components/ChevronUp.vue";
import ChevronDown from "@/Components/ChevronDown.vue";
import {onMounted, reactive, ref, toRaw, watch} from "vue";
import CloseXSvg from "@/Components/CloseXSvg.vue";
import SingleSelectTag from "@/Components/SingleSelectTag.vue";
import {debounce} from "lodash";

const props = defineProps({
    title: {
        type: String,
        required: true
    },
    tags: {
        type: String,
        required: true
    }
})

let show = reactive(ref(false))

let tags = ref(props.tags)

function handleToggleSimple() {
    debounce(() => {
        show.value = !show.value
    }, 100)();
}

const setTitle = (tag) => {
    const [key] = Object.keys(tag)
    return tag[key]
}

const tagRef = ref(null);
const inputRef = ref(null);

const setTag = (tag) => {
    tagRef.value = tag === 'All' ? 'All' : setTitle(tag)
    getTag(tagRef.value)
}

const focusInput = () => {
    inputRef.value.focus()
}

const handleToggle = (event) => {
    if (event.target.tagName === "INPUT" && show.value) {
        return
    }
    handleToggleSimple()
    focusInput()
}

const clearInput = () => {
    tagRef.value = ''
    inputRef.value.focus()
    handleToggleSimple()
}

const emits = defineEmits(['getTag'])

const getTag = (tag) => {
    emits('getTag', tag)
}

onMounted(() => {
    tagRef.value = props.title.includes('Disease') ? 'Autism' : 'All'
    getTag(tagRef.value)
})


</script>

<template>
    <div class="w-full px-4">
        <div class="max-w-md mx-auto">
            <div class="font-semibold block py-2">{{ props.title }}</div>

            <div class="relative border">
                <div class="h-10 bg-white flex border-transparent active:border-none focus:border-transparent active:outline-none rounded items-center">
                    <input ref="inputRef" v-model="tagRef" @click="handleToggle" @focusout="handleToggleSimple" class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800 border-none focus:outline-none focus:border-none !ring-transparent active:border-none hover:border-none" placeholder="Search" checked />

                    <button class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-gray-600">
                        <close-x-svg @click="clearInput" />
                    </button>
                    <label @click="handleToggle" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-gray-600 h-4/5 flex items-center">
                        <chevron-up class="mx-2" v-if="!show"/>
                        <chevron-down class="mx-2 h-3/5 w-2/5" v-if="show"/>
                    </label>
                </div>

                <input type="checkbox" class="hidden peer" checked />
                <div v-if="show" :class="{'h-32' : tags?.length > 3}" class="absolute left-0 rounded shadow bg-white overflow-hidden hidden peer-checked:flex flex-col w-full mt-1 border border-gray-200 overflow-y-auto">
                    <single-select-tag @click="() => setTag('All')" v-if="!props.title.includes('Disease')" title="All" />
                    <single-select-tag @click="() => setTag(tag)" v-for="tag in tags" :title="setTitle(tag)" />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'single-select'
}
</script>
