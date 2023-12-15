<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>

    <label class="flex font-bold capitalize py-2 text-sm text-white">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>

</template>
