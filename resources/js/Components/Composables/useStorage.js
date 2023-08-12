import {ref, watch} from "vue";

export function useStorage(key, value = []) {
    let storedVal = JSON.parse(localStorage.getItem(key));

    let val = [];

    if(storedVal) {
        val = ref(storedVal);
    } else {
        val = ref(val);

        write(value);
    }

    watch(val, write, {deep: true});

    function write(newVal) {
        localStorage.setItem(key, JSON.stringify(newVal));
    }

    return ref(storedVal);
}
