<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,router  } from '@inertiajs/vue3';
import { reactive,ref } from 'vue'

import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import InputLabel from '@/Components/InputLabel.vue'


function date_formatter(date){
    const theDate = new Date(date);
    return theDate.toLocaleString('en-US', { timeZone: 'UTC' })
}

const formatter = new Intl.NumberFormat('en-US', {style: 'currency', currency: 'PHP'})

function toCurrency(price){
    return formatter.format(price);
}
const props = defineProps({
    schedule: Object,
    busroute: Object,
    bus: Object,
    total_reserve: Number

  })

  const reserve_count = ref(0);

function compute_total_price ( number_of_seat,price){
    return price*number_of_seat;
}

  const form= reactive({
            arrival_time: props.schedule.arrival_time,
            departure_time: props.schedule.departure_time,
            bus_id: props.schedule.bus_id,
            route_id:props.schedule.route_id,
            origin: props.busroute.origin,
            destination: props.busroute.destination,
            code:props.bus.code,
            type:props.bus.type,
            total_reserve:props.total_reserve,
            price:props.schedule.price


    })

    function update() {
        router.post(`/reserve/${props.schedule.id}`, {
            _method: 'post',
            reserve_count: reserve_count._value,

        })
  }

</script>



<template>
    <Head title="Update Bus Schedule" />

    <AuthenticatedLayout>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden ma-8 w-100  bg-white rounded-lg border shadow-xs">
                    <div class="text-3xl  mt-2 font-bold text-center">
                        Reserve a Seat/s
                    </div>
                    <hr class="border-t-2 border-gray-500 my-4">
                    <div class="overflow-x-auto  mx-8 text-xl ">

                                <div class="flex mb-4">
                                    <span class="font-bold mr-5"> Departure Time:</span>
                                    <span>   {{ date_formatter(form.departure_time) }}  </span>
                                    <span class="font-bold mr-5 ml-5"> Departure Time:</span>
                                    <span> {{ date_formatter(form.arrival_time) }} </span>
                                </div>
                                <div class="flex mb-4">
                                    <span class="font-bold mr-5"> Origin:</span>
                                    <span>   {{ form.origin }}  </span>
                                    <span class="font-bold mr-5 ml-20"> Destination:</span>
                                    <span> {{ form.destination }} </span>
                                </div>
                                <div class="flex mb-4">
                                    <span class="font-bold mr-5"> Bus Type:</span>
                                    <span>   {{ form.type }}  </span>
                                    <span class="font-bold mr-5 ml-20"> Bus Code:</span>
                                    <span> {{ form.code}} </span>
                                </div>
                                <div class="flex mb-4">
                                    <span class="font-bold mr-5"> Seat Left:</span>
                                    <span>   {{ form.total_reserve }} seat/s </span>
                                    <span class="font-bold mr-5 ml-20"> Price: </span>
                                    <span> {{ toCurrency(form.price) }} per seat </span>
                                </div>
                                <div class="flex mb-4">
                                    <div v-if="form.total_reserve>0" >
                                        <form @submit.prevent="update" >
                                            <InputLabel for="reserve_count" value="Seat to Reserve" />
                                            <TextInput  type="number" v-model="reserve_count" />
                                            <div class="block mt-4">
                                                <PrimaryButton type="submit" v-if="reserve_count>0 "> Reserve  </PrimaryButton>
                                            </div>
                                        </form>
                                        <div class="flex mb-4">
                                           <p class="text-3xl text-red-500 text-bold ">Total Price {{ toCurrency(compute_total_price(reserve_count, form.price)) }}  </p>
                                         </div>
                                    </div>
                                    <div>
                                        <div class="flex mb-4">
                                           <p class="text-3xl text-red-500 text-bold ">No More Available Seat  </p>
                                         </div>
                                    </div>
                               </div>



                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
