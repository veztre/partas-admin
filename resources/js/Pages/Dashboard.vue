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
});

console.log('Fetched Bus Types:', props.busRoutes);

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
        data:  Object.values(props.busRoutes),
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
        data:  Object.values(props.busCapacity),
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
        <div class="flex justify-center">
            <div class="p-6 dark:border-gray-700 mt-14 bg-blue-400 h-screen">
                <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 bg-white p-6 rounded-xl">
                        <Bar :data="chartData" :options="chartOptions" />
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 bg-white p-6 rounded-xl">
                        <Bar :data="chartData1" :options="chartOptions" />
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-white p-6 w-[500px] rounded-xl my-5">
                        <div class="items-center">
                            <legend>Bus Routes</legend>
                            <div class="w-full md:w-auto">
                                <Pie :data="data" :options="options" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
