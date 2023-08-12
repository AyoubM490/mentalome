import {computed, onMounted, onUnmounted, ref, toRaw} from "vue";
import {router, usePage} from "@inertiajs/vue3";
import {useIntersect} from "./useIntersect.js";

export function useInfiniteScroll(propName, landmark = null) {
    const value = () => usePage().props[propName];

    const items = ref(value()?.data);

    const initialUrl = usePage().url;

    const canLoadMoreItems = computed(() => value()?.next_page_url !== null);


    const loadMoreItems = () => {
        if (!canLoadMoreItems.value) {
            return;
        }
        console.log(value())

        router.get(value()?.next_page_url,  {
            preserveState: true,
            preserveScroll: true,
            only: [propName],
            onSuccess: () => {
                console.log("success")
                window.history.replaceState({}, '', initialUrl);
                items.value = [...items.value, ...toRaw(value()).data];
            },
        });
    };
    if (landmark !== null) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    loadMoreItems();
                }
            });
        }, {
            rootMargin: '0px 0px 100px 0px'
        });

        onMounted(() => {
            observer.observe(landmark.value);
        });

        onUnmounted(() => observer.disconnect());
    }

    return {
        items,
        loadMoreItems,
        reset: () => items.value = value().data,
        canLoadMoreItems,
    };
}
