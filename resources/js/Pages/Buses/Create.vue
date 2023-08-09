<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,router  } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { reactive,ref } from 'vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'

  const form=reactive({
      code: "",
      capacity: "",
      type: ""
  })

  function submit() {
      router.post(route("bus.store"),form);
  }
  


</script>

<template>
    <Head title="Create Bus " />

    <AuthenticatedLayout>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="overflow-hidden ma-8 w-100  bg-red-200 rounded-lg border shadow-xs">
                    <div class="flex md:items-center m-6">
                            <form class="w-full max-w-sm"  @submit.prevent="submit">
                                <div class="md:w-1/3">
                                <InputLabel for="code" class="" value="Code"/>
                                </div>
                                <div class="block w-full">
                                    <TextInput  id="origin"  type="text" v-model="form.code" required />
                                </div>
                                <InputLabel for="type" class="block font-medium text-gray-700">Select Bus Type:</InputLabel>
                                <select id="type" v-model="form.type" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none focus:border-indigo-500">
                                    <option value="deluxe">De Luxe</option>
                                    <option value="firstclass">First Class</option>
                                    <option value="luxury">Luxury</option>
                                    <option value="superdeluxe">Super De Luxe</option>
                                 </select>

                                <InputLabel for="capacity"  class="block w-1/2 mt-5" value="Capacity"/>
                                <TextInput
                                    id="capacity"
                                    type="number"
                                    v-model="form.capacity"
                                    required
                                />
                                <div class=" py-3 md:w-1/3">
                                <PrimaryButton type="submit"> Submit  </PrimaryButton>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
