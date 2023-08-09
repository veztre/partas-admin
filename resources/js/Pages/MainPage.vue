<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Carousel from '@/Components/Carousel.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },

});
</script>



<template>
<nav class="bg-gradient-to-b from-green-400 to-blue-400
            fixed top-0 z-50 w-full bg-white border-b border-gray-200
            dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <Link href="/" class="flex ml-2 md:mr-24">
                    <img src="/storage/partas_logo.png" class="h-8 mr-3" alt="FlowBite Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Partas Bus Inc</span>
                    </Link>
                    <span class="self-center text-xl text-green-800 font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Ticket Reservation System</span>
                </div>
                <div class="flex items-center">
                        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                <Link
                                    v-if="$page.props.auth.user"
                                    :href="route('dashboard')"
                                    class="font-semibold text-2xl text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                    >Dashboard</Link
                                >

                                <template v-else>
                                    <div class="flex justify-between">
                                    <Link
                                        :href="route('login')"
                                        class="flex font-semibold  text-xl text-gray-600 hover:text-gray-900 dark:text-gray-400
                                               dark:hover:text-white focus:outline focus:outline-2
                                               focus:rounded-sm focus:outline-red-500"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                        </svg>
                                        Log in
                                    </Link>

                                    <Link
                                        v-if="canRegister"
                                        :href="route('register')"
                                        class="flex ml-4 font-semibold text-xl text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                             <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>

                                        Register</Link
                                    >
                                    </div>
                                </template>
                        </div>
                </div>
        </div>
  </div>
</nav>

<div class="p-6 dark:border-gray-700 mt-14 bg-blue-400">
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://nr4kmtcwpy93.objectstorage.ap-tokyo-1.oci.customer-oci.com/n/nr4kmtcwpy93/b/bucket-20230809-1910/o/carousel1.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://nr4kmtcwpy93.objectstorage.ap-tokyo-1.oci.customer-oci.com/n/nr4kmtcwpy93/b/bucket-20230809-1910/o/carousel1.png" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://nr4kmtcwpy93.objectstorage.ap-tokyo-1.oci.customer-oci.com/n/nr4kmtcwpy93/b/bucket-20230809-1910/o/carousel2.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://nr4kmtcwpy93.objectstorage.ap-tokyo-1.oci.customer-oci.com/n/nr4kmtcwpy93/b/bucket-20230809-1910/o/carousel3.jpg" alt="">
        </div>
        <div>
            <Carousel />
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://nr4kmtcwpy93.objectstorage.ap-tokyo-1.oci.customer-oci.com/n/nr4kmtcwpy93/b/bucket-20230809-1910/o/carousel1.png" alt="">
        </div>

    </div>
</div>

</template>

<style>


</style>
