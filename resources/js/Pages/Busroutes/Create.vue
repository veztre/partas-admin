<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,router  } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { reactive,ref } from 'vue'

  const form=reactive({
      origin: "",
      destination: "",
  })

  function submit() {
      router.post(route("busroutes.store"),form);
  }


</script>

<template>
    <Head title="Create Bus Route" />

    <AuthenticatedLayout>
       

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden ma-8 w-100  bg-red-200 rounded-lg border shadow-xs">
                    <div class="overflow-x-auto  m-5">
                            <form @submit.prevent="submit">
                                <div class="mb-4">
                                <InputLabel for="origin" value="origin" />
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
                                <PrimaryButton type="submit" class="flex items-center bg-blue-500 hover:bg-blue-700 text-white font-semibold px-3 py-2 rounded mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Submit</PrimaryButton>
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
