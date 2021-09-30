<template>
    <app-layout>
        <div class="m-6">
            <div class="flex justify-start">
                <h1 class="mx-6">Shifts Index</h1>
                <inertia-link class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" :href="route('shifts.create')">
                    <span>Create</span>
                    <span class="hidden md:inline">Shift</span>
                </inertia-link>
            </div>
            <div class="m-6 flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        AM/PM
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Station
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Person
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(shift, shiftIdx) in shifts" :key="shift.id"
                                    :class="shiftIdx % 2 === 0 ? 'bg-white' : 'bg-gray-50'">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ formatDisplayDate(shift.date) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ shift.am_pm.toUpperCase() }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ shift.station.station_number }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ shift.user.name }}
                                    </td>
                                    <!--                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-->
                                    <!--                                    {{ person.role }}-->
                                    <!--                                </td>-->
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetButton from '@/Jetstream/Button'
import Welcome from "@/Jetstream/Welcome";
import { format } from 'date-fns';

export default {
    name: 'Index',
    props: {
        shifts: Array
    },
    components: {
        AppLayout,
        JetButton
    },
    computed: {
        currentDate() {
            return format(new Date(), 'M/d/yyyy')
        }
    },
    methods: {
        formatDisplayDate(date) {
            return format(new Date(date), 'M/d/yyyy')
        }
    }
}
</script>

<style scoped>

</style>
