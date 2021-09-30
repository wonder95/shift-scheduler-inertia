<template>
    <jet-form-section @submitted="updateCertsInformation">
        <template #title>
            Certifications
        </template>

        <template #form>
            <div class="mt-4">
                <jet-label for="sr_ff">
                    <div class="flex items-center">
                        <jet-checkbox name="sr_ff" id="sr_ff" v-model:checked="form.sr_ff" />

                        <div class="ml-2">
                            Senior Firefighter
                        </div>
                    </div>
                </jet-label>
            </div>

            <div class="mt-4">
                <jet-label for="driver">
                    <div class="flex items-center">
                        <jet-checkbox name="driver" id="driver" v-model:checked="form.driver" />

                        <div class="ml-2">
                            Driver
                        </div>
                    </div>
                </jet-label>
            </div>

            <div class="mt-4">
                <jet-label for="ao">
                    <div class="flex items-center">
                        <jet-checkbox name="ao" id="ao" v-model:checked="form.ao" />

                        <div class="ml-2">
                            Apparatus Operator
                        </div>
                    </div>
                </jet-label>
            </div>

            <div class="mt-4">
                <jet-label for="wto">
                    <div class="flex items-center">
                        <jet-checkbox name="wto" id="ao" v-model:checked="form.wto" />

                        <div class="ml-2">
                            WT Operator
                        </div>
                    </div>
                </jet-label>
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
import JetFormSection from '@/Jetstream/FormSection'
import JetActionMessage from '@/Jetstream/ActionMessage'
import JetCheckbox from '@/Jetstream/Checkbox'

export default {
    name: 'UserCertsForm',
    components: {
        JetValidationErrors,
        JetInput,
        JetPhoneInput,
        JetLabel,
        JetFormSection,
        JetActionMessage,
        JetButton,
        JetCheckbox
    },
    methods: {
        updateCertsInformation() {

        }
    },
    data() {
        return {
            form: this.$inertia.form({
                sr_ff: false,
                driver: false,
                ao: false,
                wto: false
            })
        }
    }
}
</script>
