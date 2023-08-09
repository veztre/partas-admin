<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,router  } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import { reactive,ref } from 'vue'

import PrimaryButton from '@/Components/PrimaryButton.vue'
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
      busroute: Object
  })
//   function submit(busroute) {
//       router.put(route("busroutes.update"),busroute);
//   }


  const form= reactive({
            _method: 'put',
            origin: props.busroute.origin,
            destination: props.busroute.destination,
    })

    function update() {
        router.post(`/busroute/${props.busroute.id}`, {
            _method: 'put',
            origin: form.origin,
            destination: form.destination,
        })
  }

</script>



<template>
    <Head title="Update Bus Route" />

    <AuthenticatedLayout>
       

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden ma-8  bg-red-200 rounded-lg border shadow-xs">
                    <div class="overflow-x-auto  m-8 ">
                            <form @submit.prevent="update" >
                                <div class="mb-4">
                                    <InputLabel for="origin" value="origin"/>
                                    <TextInput
                                        id="origin"
                                        type="text"
                                        v-model="form.origin"
                                        required
                                    />
                                </div>
                                <div class="mb-4">
                                <InputLabel for="destination"  value="destination"/>
                                <TextInput
                                    id="destination"
                                    type="text"
                                    v-model="form.destination"
                                    required
                                />
                                </div>
                                <PrimaryButton>Submit</PrimaryButton>
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
