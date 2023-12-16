<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Carousel from '@/Components/Carousel.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { watch, ref, onMounted, defineProps } from 'vue';
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
    ArcElement,
} from 'chart.js'
import { Bar, Pie } from 'vue-chartjs'

ChartJS.register(CategoryScale, ArcElement, LinearScale, BarElement, Title, Tooltip, Legend)

const props = defineProps({
    busTypes: Object,
    busCapacity: Object,
    busRoutes: Object,
    price: Number,
    busCount: Number,
});

console.log('Fetched Bus Types:', props.busCount);

const chartData = ref({
    labels: Object.keys(props.busRoutes),
    datasets: [
        {
            label: 'Bus Routes',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            hoverBackgroundColor: 'rgba(75, 192, 192, 0.4)',
            hoverBorderColor: 'rgba(75, 192, 192, 1)',
            data: Object.values(props.busRoutes),
        },
    ],
});

const chartData1 = ref({
    labels: Object.keys(props.busCapacity),
    datasets: [
        {
            label: 'Bus Capacity',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            hoverBackgroundColor: 'rgba(75, 192, 192, 0.4)',
            hoverBorderColor: 'rgba(75, 192, 192, 1)',
            data: Object.values(props.busCapacity),
        },
    ],
});
const busRouteLabels = Object.keys(props.busTypes);
const busRoutesData = Object.values(props.busTypes);
const colors = generateRandomColors(busRouteLabels.length);
function generateRandomColors(count) {
    const randomColors = [];
    for (let i = 0; i < count; i++) {
        const color = `#${Math.floor(Math.random() * 16777215).toString(16)}`;
        randomColors.push(color);
    }
    return randomColors;
}
const data = {
    labels: busRouteLabels,
    datasets: [
        {
            label: 'Bus Type',
            backgroundColor: colors,
            data: busRoutesData,
        }
    ]
}

const chartOptions = ref({
    responsive: true,
});
const options = ref({
    responsive: true,
    maintainAspectRatio: false
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="flex justify-center mt-[-30px]">
            <div class="bg-[#929abc] rounded-lg p-10 dark:border-gray-700 mt-14">
                <div
                    class="self-center text-xl text-white font-semibold sm:text-2xl whitespace-nowrap dark:text-white mb-5">
                    <p>Data Charts</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                    <!-- Container for the Pie chart -->
                    <div class="bg-[#f0f0f8] text-black p-6 rounded-xl">
                        <legend>Bus Routes</legend>
                        <div class="w-full md:w-auto">
                            <Pie :data="data" :options="options" />
                        </div>
                    </div>

                    <!-- Container for Bar graphs (in a row) -->
                    <div class="flex flex-col md:flex-row md:space-x-4">
                        <div class="bg-[#f0f0f8] text-black p-6 rounded-xl flex-1">
                            <Bar :data="chartData" :options="chartOptions" />
                        </div>
                        <div class="bg-[#f0f0f8] text-black p-6 rounded-xl flex-1">
                            <Bar :data="chartData1" :options="chartOptions" />
                        </div>

                    </div>
                    <div class="stats shadow bg-[#f0f0f8]">

                        <!-- <div class="stat place-items-center">
                            <div class="stat-title">Downloads</div>
                            <div class="stat-value">31K</div>
                            <div class="stat-desc">From January 1st to February 1st</div>
                        </div> -->

                        <div class="stat place-items-center">
                            <div class="stat-title">Number of busses</div>
                            <div class="stat-value text-secondary">{{props.busCount}}</div>
                            <!-- <div class="stat-desc text-secondary">↗︎ 40 (2%)</div> -->
                        </div>

                        <div class="stat place-items-center">
                            <div class="stat-title">Total Profits</div>
                            <div class="stat-value">{{props.price}}</div>
                            <!-- <div class="stat-desc">↘︎ 90 (14%)</div> -->
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
