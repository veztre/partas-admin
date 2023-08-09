<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'

defineProps({
    payments: Object,
})
function date_formatter(date){
    const theDate = new Date(date);
    return theDate.toLocaleString('en-PH', {  dateStyle: 'long',timeStyle: 'short' })
}

const formatter = new Intl.NumberFormat('en-US', {style: 'currency', currency: 'PHP'})

function toCurrency(price){
    return formatter.format(price);
}
function destroy(id){
    if (confirm('Are you sure you want to delete this Schedule ?',id)) {
       router.delete(route("schedule.destroy",id));
    }
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
                                <th class="px-4 py-3">Seat Number</th>
                                <th class="px-4 py-3">Amount</th>
                                 <th class="px-4 py-3">Payment Date</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Action</th>

                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y" >
                                <tr v-for="payment in payments" :key="payment.id" class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td>
                                    {{ payment.bus_schedule_id }}
                                    </td>
                                    <td >
                                    {{ payment.seat_number }}
                                    </td>
                                    <td >
                                    {{ toCurrency(payment.amount) }}
                                    </td>
                                    <td >
                                    {{ date_formatter(payment.payment_date) }}
                                    </td>
                                    <td >
                                    {{ payment.payment_status }}
                                    </td>

                                    <!-- <td class="flex">
                                        <Link :href="route('schedule.show')"
                                            class="flex items-center bg-blue-500 hover:bg-blue-700 text-white font-semibold px-3 py-2  m-2 rounded mx-2"
                                            :data= "{id: schedule.id}" as="button" >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                             </svg> Show Details
                                        </Link>
                                    </td> -->
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
