<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,router  } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { reactive,ref } from 'vue'

const props = defineProps({
      bus: Object
  })
//   function submit(busroute) {
//       router.put(route("busroutes.update"),busroute);
//   }


  const form= reactive({
            _method: 'put',
            capacity: props.bus.capacity,
            code: props.bus.code,
            type: props.bus.type

    })

    function update() {
        router.post(`/bus/${props.bus.id}`, {
            _method: 'put',
            capacity: form.capacity,
            code: form.code,
            type: form.type
        })
  }

</script>



<template>
    <Head title="Update Bus Route" />

    <AuthenticatedLayout>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden ma-8 w-100  bg-red-200 rounded-lg border shadow-xs">
                    <div class="overflow-x-auto  mx-8 ">
                            <form @submit.prevent="update" >
                                <InputLabel for="code" value="Code"/>
                                <TextInput
                                    id="code"
                                    type="text"
                                    v-model="form.code"
                                    required
                                />
                                <InputLabel for="type" class="block font-medium text-gray-700">Select Bus Type:</InputLabel>
                                <select id="type" v-model="form.type" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none focus:border-indigo-500">
                                    <option value="deluxe">De Luxe</option>
                                    <option value="firstclass">First Class</option>
                                    <option value="luxury">Luxury</option>
                                    <option value="superdeluxe">Super De Luxe</option>
                                 </select>
                                <InputLabel for="capacity"  value="Capacity"/>
                                <TextInput
                                    id="capacity"
                                    type="number"
                                    v-model="form.capacity"

                                    required
                                />
                                <div class=" py-3 md:w-1/3">
                                   <PrimaryButton>Submit</PrimaryButton>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
