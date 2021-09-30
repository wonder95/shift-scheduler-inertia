<template>
    <app-layout>
        <div class="mx-6">
            <form @submit.prevent="store" class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Create Shift
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                Enter shift data and click on Save
                            </p>
                        </div>
                        <div class="space-y-6 sm:space-y-5">
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Name
                                </label>
                                <!--                            <div class="mt-1 sm:mt-0 sm:col-span-2">-->
                                <!--                                <input type="text" name="full-name" id="full-name" autocomplete="given-name"-->
                                <!--                                       class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"/>-->
                                <!--                            </div>-->
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select id="user_id" name="user_id" autocomplete="user_id" v-model="form.user_id"
                                            class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-48 shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        <template v-for="user in users" :key="user.id">
                                            <option :value="user.id">{{ user.name }}</option>
                                        </template>
                                    </select>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="date" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Date
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input id="date" name="date" type="date" autocomplete="date" v-model="form.date"
                                           class="block max-w-lg w-36 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"/>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="station" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Station
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select id="station" name="station_id" autocomplete="station_id" v-model="form.station_id"
                                            class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-24 shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                        <template v-for="station in stations" :key="station.id">
                                            <option :value="station.id">{{ station.station_number }}</option>
                                        </template>
                                    </select>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="station" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    AM/PM
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <select id="am_pm" name="am_pm" autocomplete="am_pm" v-model="form.am_pm"
                                            class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-24 shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                                  <option value="pm" selected>PM</option>
                                                  <option value="am">AM</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-start">
                        <button type="button"
                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </button>
                        <button type="submit"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'

export default {
    name: 'Create',
    components: {AppLayout},
    props: {
        users: Array,
        stations: Array
    },
    data() {
        return {
            form: this.$inertia.form({
                user_id: null,
                date: null,
                station_id: null,
                am_pm: null
            })
        }
    },
    methods: {
        store() {
            this.form.post('/shifts', this.form);
        },
    },
}
</script>

<style scoped>

</style>
