<template>
    <app-layout>
        <div class="mx-6">
            <form @submit.prevent="store" class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Volunteer Profile
                            </h3>
                        </div>
                        <div class="space-y-6 sm:space-y-5">
                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="name"
                                       class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Name
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="name" id="name" autocomplete="name"
                                           class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"/>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="cfdEmail" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    CFD Email
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input id="cfdEmail" name="cfdEmail" type="email" autocomplete="cfdEmail"
                                           class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"/>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="personalEmail" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Personal Email
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input id="personalEmail" name="personalEmail" type="email" autocomplete="personal_email"
                                           class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"/>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="primaryPhone" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Primary Phone
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input id="primaryPhone" name="primary_phone" type="tel" autocomplete="primaryPhone" maxlength="12" size="12"
                                           class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"/>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="secondaryPhone" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Secondary Phone
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input id="secondaryPhone" name="secondaryPhone" type="tel" autocomplete="secondaryPhone" maxlength="12" size="12"
                                           class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"/>
                                </div>
                            </div>

                            <div class="pt-6 sm:pt-5 sm:border-t sm:border-gray-200 sm:pt-5">
                                <div role="group" aria-labelledby="label-notifications">
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                        <div>
                                            <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                                                 id="type">
                                                Type
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <div class="max-w-lg">
                                                <div class="mt-4 space-y-4">
                                                    <div class="flex items-center">
                                                        <input id="suppression" name="type"
                                                               type="radio"
                                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"/>
                                                        <label for="suppression"
                                                               class="ml-3 block text-sm font-medium text-gray-700">
                                                            Suppression
                                                        </label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="support" name="type" type="radio"
                                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"/>
                                                        <label for="support"
                                                               class="ml-3 block text-sm font-medium text-gray-700">
                                                            Support
                                                        </label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="admin" name="type" type="radio"
                                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"/>
                                                        <label for="admin"
                                                               class="ml-3 block text-sm font-medium text-gray-700">
                                                            Admin
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="streetAddress"
                                       class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    Street address
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="streetAddress" id="streetAddress"
                                           autocomplete="streetAddress"
                                           class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"/>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="city" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    City
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="city" id="city"
                                           class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"/>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="state" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    State / Province
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="state" id="state"
                                           class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"/>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="zip" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                    ZIP / Postal
                                </label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="zip" id="zip" autocomplete="postal-code"
                                           class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="divide-y divide-gray-200 pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Certifications
                            </h3>
                        </div>

                        <div class="space-y-6 sm:space-y-5 divide-y divide-gray-200">
                            <div class="pt-6 sm:pt-5">
                                <div role="group" aria-labelledby="label-driving">
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                        <div>
                                            <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                                                 id="label-driving">
                                                Driving
                                            </div>
                                        </div>
                                        <div class="mt-4 sm:mt-0 sm:col-span-2">
                                            <div class="max-w-lg space-y-4">
                                                <div class="relative flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="comments" name="comments" type="checkbox"
                                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"/>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="comments"
                                                               class="font-medium text-gray-700">Driver</label>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="relative flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="ao" name="ao" type="checkbox"
                                                                   class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"/>
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="ao" class="font-medium text-gray-700">Apparatus Operator</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="relative flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="wto" name="wto" type="checkbox"
                                                                   class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"/>
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="wto"
                                                                   class="font-medium text-gray-700">Water Tender Operator</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6 sm:pt-5">
                                <div role="group" aria-labelledby="label-driving">
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                        <div>
                                            <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                                                 id="label-srFf">
                                                Senior Firefighter
                                            </div>
                                        </div>
                                        <div class="mt-4 sm:mt-0 sm:col-span-2">
                                            <div class="max-w-lg space-y-4">
                                                <div class="relative flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="srFf" name="srFf" type="checkbox"
                                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"/>
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="srFf"
                                                               class="font-medium text-gray-700">Yes</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="pt-6 sm:pt-5">
                                <div role="group" aria-labelledby="label-notifications">
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                        <div>
                                            <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                                                 id="label-notifications">
                                                EMT Level
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <div class="max-w-lg">
                                                <div class="mt-4 space-y-4">
                                                    <div class="flex items-center">
                                                        <input id="basic" name="emtLevel" value="basic"
                                                               type="radio"
                                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"/>
                                                        <label for="basic"
                                                               class="ml-3 block text-sm font-medium text-gray-700">
                                                            Basic
                                                        </label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="intermediate" name="emtLevel" type="radio" value="intermediate"
                                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"/>
                                                        <label for="intermediate"
                                                               class="ml-3 block text-sm font-medium text-gray-700">
                                                            Intermediate
                                                        </label>
                                                    </div>
                                                    <div class="flex items-center">
                                                        <input id="paramedic" name="emtLevel" type="radio" value="paramedic"
                                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"/>
                                                        <label for="paramedic"
                                                               class="ml-3 block text-sm font-medium text-gray-700">
                                                            Paramedic
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
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
    components: {
      AppLayout
    },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                cfdEmail: null,
                personalEmail: null,
                primaryPhone: null,
                secondaryPhone: null,
                type: null,
                streetAddress: null,
                city: null,
                state: null,
                zip: null,


            })

        }
    },
    props: {
        certs: {
            type: Array,
            required: false
        },
        contacts: {
            type: Array,
            required: false
        }
    },
    methods: {
        store() {
            this.form.post('/users', this.form);
        },
    }
}
</script>

<style scoped>

</style>
