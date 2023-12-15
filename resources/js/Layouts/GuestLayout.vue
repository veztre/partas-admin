<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen bg-gradient-to-b from-[#929ebc] to-[#bac0e4] py-4 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
        <div class="flex flex-row">
        <div class="flex flex-row">
            <Link href="/">
                <ApplicationLogo class="w-[250px] h-[250px]  text-gray-500" />
            </Link>

        </div>

        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-[#929abc] shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
