<script setup>
import {ref} from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
import Sidebar from '@/Components/Sidebar.vue'
import Navbar from '@/Components/Navbar.vue'
defineProps({
    count_reservation: Number
})

</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <Navbar/>
            <Sidebar/>
            <main class="bg-blue-400 shadow">
                <div class="p-4 sm:ml-64">
                    <div class="p-4 mt-14">
                        <slot/>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>
