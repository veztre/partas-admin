<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'

defineProps({
    reservations: Object,
})

const formatter = new Intl.NumberFormat('en-US', {style: 'currency', currency: 'PHP'})

function toCurrency(price){
    return formatter.format(price);
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   <div class="p-6 text-gray-900">
                        <div class="overflow-x-auto w-full">
                            <table class="w-full whitespace-no-wrap">
                            <thead>
                            <tr class="text-xs font-semibold TableRowacking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                                <th class="px-4 py-3">Schedule</th>
                                <th class="px-4 py-3">number of Seats</th>
                                <th class="px-4 py-3">Price</th>
                                <th class="px-4 py-3">Total Price</th>
                                <th class="px-4 py-3">Action</th>

                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y" >
                                <tr v-for="reservation in reservations" :key="reservation.bus_schedule_id" class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td>
                                    {{ reservation.bus_schedule_id }}
                                    </td>
                                    <td >
                                    {{ reservation.total_reservation }}
                                    </td>
                                    <td >
                                    {{ toCurrency(reservation.price) }}
                                    </td>
                                    <td >
                                    {{ toCurrency(reservation.price *  reservation.total_reservation) }}
                                    </td>
                                    <td class="flex">
                                        <Link :href="route('reservations.pay')"
                                            class="flex items-center bg-blue-500 hover:bg-blue-700 text-white font-semibold px-3 py-2  m-2 rounded mx-2"
                                            :data= "{id: reservation.bus_schedule_id}" as="button" >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                            </svg>
                                                Pay
                                        </Link>


                                        <Link :href="route('reservations.show_all')"
                                            class="flex items-center bg-blue-500 hover:bg-blue-700 text-white font-semibold px-3 py-2  m-2 rounded mx-2"
                                            :data= "{id: reservation.bus_schedule_id}" as="button" >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                            </svg>
                                                View
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
