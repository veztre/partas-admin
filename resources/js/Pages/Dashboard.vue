<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Carousel from '@/Components/Carousel.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="flex justify-center">
            <div class="p-6 dark:border-gray-700 mt-14 bg-blue-400">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="storage/images/carousel1.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="storage/images/carousel2.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="storage/images/carousel3.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="storage/images/carousel1.png" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="storage/images/carousel1.png" alt="">
                    </div>
                </div>
            </div>
    </div>
    </AuthenticatedLayout>
</template>
