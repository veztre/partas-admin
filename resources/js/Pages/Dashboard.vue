<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Carousel from '@/Components/Carousel.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="flex justify-center">
            <div class="p-6 dark:border-gray-700 mt-14 bg-blue-400 h-screen">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="/1.png" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="/2.png" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="/3.png" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="/4.png" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="images/carousel1.png" alt="">
                    </div>
                </div>
            </div>
    </div>
    </AuthenticatedLayout>
</template>
