<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #title>
            Profile Information
        </template>

        <template #form>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                <jet-input-error :message="form.errors.email" class="mt-2" />
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
import JetPhoneInput from '@/Jetstream/PhoneInput';
import JetLabel from '@/Jetstream/Label';
import JetFormSection from '@/Jetstream/FormSection';
import JetActionMessage from '@/Jetstream/ActionMessage';
import JetInputError from '@/Jetstream/InputError';

export default {
    name: 'UserProfileInfoForm',
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
                name: '',
                email: ''
            })
        }
    }
}
</script>
