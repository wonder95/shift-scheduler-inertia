<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #title>
            Contact Information
        </template>

        <template #form>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="personal_email" value="Personal Email" />
                <jet-input id="personal_email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                <jet-input-error :message="form.errors.personal_email" class="mt-2" />
            </div>

<!--            <div class="col-span-6 sm:col-span-4">-->
<!--                <jet-label for="primary_phone" value="Primary Phone" />-->
<!--                <jet-phone-input id="primary_phone" type="tel" class="mt-1 block w-full" v-model="form.primary_phone" :maxlength="12" :size="12" required />-->
<!--                <jet-input-error :message="form.errors.primary_phpne" class="mt-2" />-->
<!--            </div>-->

<!--            <div class="col-span-6 sm:col-span-4">-->
<!--                <jet-label for="secondary_phone" value="Secondary Phone" />-->
<!--                <jet-phone-input id="secondary_phone" type="tel" class="mt-1 block w-full" v-model="form.secondary_phone" :maxlength="12" :size="12" required />-->
<!--                <jet-input-error :message="form.errors.secondary_phone" class="mt-2" />-->
<!--            </div>-->

            <div class="sm:col-span-6">
                <label for="street-address" class="block text-sm font-medium text-gray-700">
                    Street address
                </label>
                <div class="mt-1">
                    <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />
                </div>
            </div>

            <div class="sm:col-span-2">
                <label for="city" class="block text-sm font-medium text-gray-700">
                    City
                </label>
                <div class="mt-1">
                    <input type="text" name="city" id="city" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />
                </div>
            </div>

            <div class="sm:col-span-2">
                <label for="state" class="block text-sm font-medium text-gray-700">
                    State
                </label>
                <div class="mt-1">
                    <input type="text" name="state" id="state" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />
                </div>
            </div>

            <div class="sm:col-span-2">
                <label for="zip" class="block text-sm font-medium text-gray-700">
                    ZIP
                </label>
                <div class="mt-1">
                    <input type="text" name="zip" id="zip" autocomplete="postal-code" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />
                </div>
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>

    </jet-form-section>
</template>

<script>
import JetValidationErrors from '@/Jetstream/ValidationErrors';
import JetButton from '@/Jetstream/Button';
import JetInput from '@/Jetstream/Input';
import JetInputError from '@/Jetstream/InputError';
import JetPhoneInput from '@/Jetstream/PhoneInput';
import JetLabel from '@/Jetstream/Label';
import JetFormSection from '@/Jetstream/FormSection'
import JetActionMessage from '@/Jetstream/ActionMessage'

export default {
    name: 'UserContactInfoForm',
    components: {
        JetValidationErrors,
        JetInput,
        JetPhoneInput,
        JetLabel,
        JetFormSection,
        JetActionMessage,
        JetButton,
        JetInputError
    },
    methods: {
        updateProfileInformation() {

        }
    },
    data() {
        return {
            form: this.$inertia.form({
                personal_email: '',
                primary_phone: '',
                secondary_phone: '',
                street_address: '',
                city: '',
                state: '',
                zip: ''
            })
        }
    }
}
</script>
