<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'

defineProps({
    buses: Object
})

function destroy(id){
    if (confirm('Are you sure you want to delete this Bus Information?')) {
        router.delete(route("bus.destroy",id));
    }
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-3 ">
                    <Link :href="route('bus.create')" class="flex items-center bg-blue-500 hover:bg-blue-700 text-white font-semibold px-3 py-2 rounded mx-2" as="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Add New
                    </Link>
                  </div>


                    <div class="p-6 text-gray-900">
                        <div class="overflow-x-auto w-full">
                            <table class="w-full whitespace-no-wrap">
                            <thead>
                            <tr class="text-xs font-semibold TableRowacking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                                <th class="px-4 py-3">code</th>
                                <th class="px-4 py-3">type</th>
                                <th class="px-4 py-3">capacity</th>
                                <th class="px-4 py-3" colspan="2">Actions</th>



                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y" >
                                <tr v-for="bus in buses" :key="bus.id" class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-500 dark:hover:bg-neutral-600" >
                                    <td>
                                    {{ bus.code }}
                                    </td>
                                    <td >
                                    {{ bus.type }}
                                    </td>
                                    <td >
                                    {{ bus.capacity }}
                                    </td>
                                    <td class="flex ">
                                    <Link :href="route('bus.edit')" class="flex items-center bg-blue-500 hover:bg-blue-700 text-white font-semibold px-3 py-2 m-2 rounded" :data= "{id: bus.id}" as="button" >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>
                                    </Link>

                                            <PrimaryButton
                                                class="flex items-center bg-red-500 hover:bg-red-700 text-white font-semibold px-3 py-2 m-2 rounded "
                                                @Click="destroy(bus.id)"
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                            </PrimaryButton>
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
