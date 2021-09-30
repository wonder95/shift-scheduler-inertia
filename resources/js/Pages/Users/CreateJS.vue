<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create User
            </h2>
        </template>

        <form @submit.prevent="store" class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-8 divide-y divide-gray-200">
            <div class="space-y-8 divide-y divide-gray-200">
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Profile
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            This information will be displayed publicly so be careful what you share.
                        </p>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="name" value="Name" />
                            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                            <jet-input-error :message="form.errors.name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="passowrd" value="Password" />
                            <jet-input id="pssword" type="password" class="mt-1 block w-full" v-model="form.password" autocomplete="password" />
                            <jet-input-error :message="form.errors.password" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="email" value="CFD Email" />
                            <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                            <jet-input-error :message="form.errors.email" class="mt-2" />
                        </div>

<!--                        <div class="sm:col-span-4">-->
<!--                            <label for="username" class="block text-sm font-medium text-gray-700">-->
<!--                                Username-->
<!--                            </label>-->
<!--                            <div class="mt-1 flex rounded-md shadow-sm">-->
<!--              <span-->
<!--                  class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">-->
<!--                workcation.com/-->
<!--              </span>-->
<!--                                <input type="text" name="username" id="username" autocomplete="username"-->
<!--                                       class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300"/>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="sm:col-span-6">-->
<!--                            <label for="about" class="block text-sm font-medium text-gray-700">-->
<!--                                About-->
<!--                            </label>-->
<!--                            <div class="mt-1">-->
<!--                                <textarea id="about" name="about" rows="3"-->
<!--                                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"/>-->
<!--                            </div>-->
<!--                            <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p>-->
<!--                        </div>-->

<!--                        <div class="sm:col-span-6">-->
<!--                            <label for="photo" class="block text-sm font-medium text-gray-700">-->
<!--                                Photo-->
<!--                            </label>-->
<!--                            <div class="mt-1 flex items-center">-->
<!--              <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">-->
<!--                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">-->
<!--                  <path-->
<!--                      d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>-->
<!--                </svg>-->
<!--              </span>-->
<!--                                <button type="button"-->
<!--                                        class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">-->
<!--                                    Change-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="sm:col-span-6">-->
<!--                            <label for="cover-photo" class="block text-sm font-medium text-gray-700">-->
<!--                                Cover photo-->
<!--                            </label>-->
<!--                            <div-->
<!--                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">-->
<!--                                <div class="space-y-1 text-center">-->
<!--                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"-->
<!--                                         viewBox="0 0 48 48" aria-hidden="true">-->
<!--                                        <path-->
<!--                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"-->
<!--                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                    </svg>-->
<!--                                    <div class="flex text-sm text-gray-600">-->
<!--                                        <label for="file-upload"-->
<!--                                               class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">-->
<!--                                            <span>Upload a file</span>-->
<!--                                            <input id="file-upload" name="file-upload" type="file" class="sr-only"/>-->
<!--                                        </label>-->
<!--                                        <p class="pl-1">or drag and drop</p>-->
<!--                                    </div>-->
<!--                                    <p class="text-xs text-gray-500">-->
<!--                                        PNG, JPG, GIF up to 10MB-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                </div>

                <div class="pt-8">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Personal Information
                        </h3>
                    </div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
<!--                        <div class="sm:col-span-3">-->
<!--                            <label for="first-name" class="block text-sm font-medium text-gray-700">-->
<!--                                First name-->
<!--                            </label>-->
<!--                            <div class="mt-1">-->
<!--                                <input type="text" name="first-name" id="first-name" autocomplete="given-name"-->
<!--                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"/>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="sm:col-span-3">-->
<!--                            <label for="last-name" class="block text-sm font-medium text-gray-700">-->
<!--                                Last name-->
<!--                            </label>-->
<!--                            <div class="mt-1">-->
<!--                                <input type="text" name="last-name" id="last-name" autocomplete="family-name"-->
<!--                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"/>-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="sm:col-span-4">
                            <label for="personal_email" class="block text-sm font-medium text-gray-700">
                                Personal Email address
                            </label>
                            <div class="mt-1">
                                <input id="personal_email" name="personal_email" type="email" autocomplete="email"  v-model="form.personal_email"
                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"/>
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="primary_phone" value="Primary Phone" />
                            <jet-input id="primary_phone" type="tel" class="mt-1 block w-full" v-model="form.primary_phone" />
                            <jet-input-error :message="form.errors.primary_phone" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="secondary_phone" value="Secondary Phone" />
                            <jet-input id="secondary_phone" type="tel" class="mt-1 block w-full" v-model="form.secondary_phone" />
                            <jet-input-error :message="form.errors.secondary_phone" class="mt-2" />
                        </div>

                        <div class="sm:col-span-6">
                            <label for="address" class="block text-sm font-medium text-gray-700">
                                Street address
                            </label>
                            <div class="mt-1">
                                <input type="text" name="address" id="address" v-model="form.address"
                                       autocomplete="address"
                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"/>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="city" class="block text-sm font-medium text-gray-700">
                                City
                            </label>
                            <div class="mt-1">
                                <input type="text" name="city" id="city" v-model="form.city"
                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"/>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="state" class="block text-sm font-medium text-gray-700">
                                State
                            </label>
                            <div class="mt-1">
                                <input type="text" name="state" id="state" v-model="form.state"
                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"/>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="zip" class="block text-sm font-medium text-gray-700">
                                ZIP
                            </label>
                            <div class="mt-1">
                                <input type="text" name="zip" id="zip" autocomplete="postal-code" v-model="form.zip"
                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"/>
                            </div>
                        </div>
                    </div>
                </div>

                <fieldset class="mt-6">
                    <div>
                        <legend class="text-base font-medium text-gray-900">
                            Type
                        </legend>
                    </div>
                    <div class="mt-4 space-y-4">
                        <div class="flex items-center">
                            <input id="suppression" name="type" type="radio" value="suppression" v-model="form.type"
                                   class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"/>
                            <label for="basic" class="ml-3 block text-sm font-medium text-gray-700">
                                Suppression
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="support" name="type" type="radio" value="support" v-model="form.type"
                                   class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"/>
                            <label for="intermediate" class="ml-3 block text-sm font-medium text-gray-700">
                                Support
                            </label>
                        </div>
                    </div>
                </fieldset>

                <div class="pt-8">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Certifications
                        </h3>
                    </div>
                    <div class="mt-6">
                        <fieldset>
                            <legend class="text-base font-medium text-gray-900">
                                Driving
                            </legend>
                            <div class="mt-4 space-y-4">
                                <div class="relative flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="driver" name="driving" type="checkbox"  v-model="form.driver"
                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"/>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="driver" class="font-medium text-gray-700">Driver</label>
                                    </div>
                                </div>
                                <div class="relative flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="ao" name="ao" type="checkbox" v-model="form.ao"
                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"/>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="ao" class="font-medium text-gray-700">Apparatus Operator</label>
                                    </div>
                                </div>
                                <div class="relative flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="wto" name="wto" type="checkbox" v-model="form.wto"
                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"/>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="wto" class="font-medium text-gray-700">Water Tender Operator</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="mt-6">
                            <div>
                                <legend class="text-base font-medium text-gray-900">
                                    EMT Level
                                </legend>
                            </div>
                            <div class="mt-4 space-y-4">
                                <div class="flex items-center">
                                    <input id="responder" name="emt_type" type="radio" value ="R" v-model="form.emt_type" required
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"/>
                                    <label for="basic" class="ml-3 block text-sm font-medium text-gray-700">
                                        First Responder
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="basic" name="emt_type" type="radio" value ="B" v-model="form.emt_type"
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"/>
                                    <label for="basic" class="ml-3 block text-sm font-medium text-gray-700">
                                        Basic
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="intermediate" name="emt_type" type="radio" value ="I" v-model="form.emt_type"
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"/>
                                    <label for="intermediate" class="ml-3 block text-sm font-medium text-gray-700">
                                        Intermediate
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="paramedic" name="emt_type" type="radio" value ="P" v-model="form.emt_type"
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"/>
                                    <label for="paramedic" class="ml-3 block text-sm font-medium text-gray-700">
                                        Paramedic
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <h2>Senior Firefighter</h2>
                        <div class="mt-6 relative flex items-start">
                            <div class="flex items-center h-5">
                                <input id="sr_ff" name="sr_ff" type="checkbox" v-model="form.sr_ff"
                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"/>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="sr_ff" class="font-medium text-gray-700">Senior Firefighter</label>
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
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo';
import JetButton from '@/Jetstream/Button';
import JetInput from '@/Jetstream/Input';
import JetPhoneInput from '@/Jetstream/PhoneInput';
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from '@/Jetstream/Label';
import JetValidationErrors from '@/Jetstream/ValidationErrors';
import JetSectionBorder from '@/Jetstream/SectionBorder'
import UserContactInfoForm from "@/Pages/Users/UserContactInfoForm";
import UserProfileInfoForm from "@/Pages/Users/UserProfileInfoForm";
import UserCertsForm from "@/Pages/Users/UserCertsForm";

export default {
    name: 'CreateJS',
    components: {
        AppLayout,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetPhoneInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors,
        JetSectionBorder,
        UserContactInfoForm,
        UserProfileInfoForm,
        UserCertsForm
    },
    data() {
        return {
            form: this.$inertia.form({
                name: 'Joe Blow',
                email: 'joe@clackmsfire.com',
                password: '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                type: '',
                personal_email: 'joe@blow.com',
                primary_phone: '503-555-1212',
                secondary_phone: '971-806-5254',
                address: '',
                city: '',
                state: '',
                zip: '',
                driver: false,
                ao: false,
                wto: false,
                emt_type: '',
                sr_ff: false
            })
        }
    },
    methods: {
        store() {
            console.log(this.form);
            this.form.post('/users', this.form);
        }
    }
}
</script>

<style scoped>

</style>
