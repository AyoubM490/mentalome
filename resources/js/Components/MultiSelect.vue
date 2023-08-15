<script setup>
import {onMounted, reactive, ref, toRaw, watch} from "vue";
import Tag from "@/Components/MultiSelectTag.vue";
import ChevronUp from "@/Components/ChevronUp.vue";
import ChevronDown from "@/Components/ChevronDown.vue";
import Option from "@/Components/Option.vue";
import {debounce, throttle} from "lodash";
import {useStorage} from "@/Components/Composables/useStorage.js";
import {useInfiniteScroll} from "@/Components/Composables/useInfiniteScroll.js";
import {router} from "@inertiajs/vue3";

let show = reactive(ref(false))

const props = defineProps({
    title: {
        type: String,
        required: true
    },
    geneIds: {
        type: Object,
        required: true
    },
    selectedGeneIds: {
        type: Object,
        required: true
    },
    filters: {
        type: Object
    }
});

const handleToggle = (event) => {
    let tagName = event.target?.tagName
    const isSvg = tagName === "path" || tagName === "svg" || tagName === "polyline"
    const isInputOrButton = tagName === "INPUT" || tagName === "BUTTON"
    if (show.value && tagName === "INPUT") {
    } else if (!show.value && (isSvg || isInputOrButton)) {
        show.value = !show.value
    }
}

const handleToggleSimple = (event) => {
    debounce(() => {
        show.value = !show.value
    }, 100)();
}

let selectedGeneIdsFresh = props.selectedGeneIds?.map(gene_ids => gene_ids.gene_ids);
let selectedTags = ref(selectedGeneIdsFresh)

let landmark = ref(null);

let {items: options, loadMoreItems} = useInfiniteScroll('gene_ids_search', landmark)
options = toRaw(options.value)?.map(option => option.gene_ids)

const moveOptionToSelectedTags = (option) => {
    let tags = toRaw(selectedTags.value) ? toRaw(selectedTags.value) : selectedTags
    if ((tags.value && !tags.value?.includes(option)) || !tags.includes(option)) {
        selectedTags = [...tags, option]
        getSelectedGeneIds(selectedTags)
    }
}

const removeFromSelectedTags = (tag) => {
    let tags = toRaw(selectedTags.value) ? toRaw(selectedTags.value) : selectedTags
    if ((tags.value && tags.value?.includes(tag)) || tags.includes(tag)) {
        selectedTags = tags.filter(item => item !== tag)
        handleToggleSimple()
        getSelectedGeneIds(selectedTags)
        inputRef.value.focus()
    }
}

let inputRef = ref(null)

const emits = defineEmits(['getSelectedGeneIds'])

const getSelectedGeneIds = (selectedTags) => {
    emits('getSelectedGeneIds', selectedTags)
};

onMounted(() => {
    getSelectedGeneIds(toRaw(selectedTags.value))
})


let search = ref('')

</script>

<template>
    <div class="w-full flex flex-col items-center mx-auto">
        <div class="w-full px-4">
            <div>{{ props.title }}:</div>
            <div class="flex flex-col items-center relative">
                <div class="w-full">
                    <div class="my-2 p-1 flex border border-gray-200 bg-white rounded svelte-1l8159u">
                        <div class="flex flex-auto flex-wrap">
                            <tag @remove="() => removeFromSelectedTags(tag)" v-for="tag in selectedTags" :tag="tag"
                                 :key="tag"/>
                            <div class="flex-1 border-transparent active:border-transparent">
                                <input ref="inputRef" v-model="search" @click="handleToggle"
                                       @focusout="handleToggleSimple" placeholder=""
                                       class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800 border-none focus:outline-none focus:border-none !ring-transparent active:border-none hover:border-none"/>
                            </div>
                        </div>
                        <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                            <button @click.stop="handleToggle"
                                    class="align-center cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                <chevron-up v-if="!show"/>
                                <chevron-down class="text-xs" v-if="show"/>
                            </button>
                        </div>
                    </div>
                </div>
                <div @scrollend="loadMoreItems" :class="{'hidden' : !show}"
                     class="absolute shadow top-100 bg-white z-40 w-full rounded max-h-select overflow-y-auto h-32">
                    <Option @click="() => moveOptionToSelectedTags(option)" v-for="option in options" :value="option" :key="option"/>
                    <div ref="landmark"></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'multi-select'
}
</script>
<style scoped>

.top-100 {
    top: 100%
}

.bottom-100 {
    bottom: 100%
}

.max-h-select {
    max-height: 300px;
}
</style>
