<script setup>

const props = defineProps({
    title: {
        type: String,
        required: true
    }
})

</script>

<template>
    <section class="box shadow-lg rounded mt-8 bg-white">
        <div :class="{'mb-20': props.title !== 'Heatmap', 'mb-16': props.title === 'Heatmap'}">
            <h2 class="h2 pt-12 text-center font-bold">{{ props.title }}</h2>
        </div>

        <slot></slot>

    </section>
</template>

<style scoped>
.h2 {
    font-size: 2rem;
    color: #6E85B7;
}

.style-button {
    background-color: #6E85B7;
    color: white;
}

</style>
