<template>
    <TransitionRoot as="template" :show="isOpen">
        <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto" @close="openModal">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                </TransitionChild>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                        <div>
                            <div class="mt-3 text-center sm:mt-5">
                                <button class="top-3 right-3 absolute" @click="closeModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                <div class="mx-auto flex flex-col items-center justify-center">
                                    <span>Date: {{ date }}</span>
                                    <span>Station: {{ station }}</span>
                                    <span>AM/PM: {{ am_pm.toUpperCase() }}</span>
                                </div>
                                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900 mt-4">
                                    Select Person
                                </DialogTitle>
                                <div class="sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Person
                                    </label>
                                    <div class="mt-2 sm:mt-0 sm:col-span-2">
                                        <select :disabled="selectDisabled"
                                            v-model="userId"
                                            id="user_id" name="user_id" autocomplete="user_id" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                            <option selected="selected" value="">Select Person</option>
                                            <template v-for="user in users">
                                                <option :value="user.id">{{ user.name }}</option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                                <label class="mt-6 select-none flex items-center" for="doNotFill">
                                    <input id="doNotFill" v-model="doNotfill" class="mr-1" type="checkbox"
                                        @change="selectDoNotFill"
                                    />
                                    <span class="text-sm">Do Not Fill</span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6">
                            <button type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm"
                                    @click="addShift">
                                Add Shift
                            </button>
                        </div>
                    </div>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogOverlay,
    DialogTitle,
} from "@headlessui/vue";
import { mapGetters } from 'vuex'
import Checkbox from "@/Jetstream/Checkbox";

export default {
    name: 'AdminUserAddShiftModal',
    data() {
        return {
            userId: null,
            doNotFill: false,
            selectDisabled: false
        }
    },
    props: {
        isOpen: {
            type: Boolean,
            required: true
        },
        date: String,
        station: Number,
        am_pm: String
    },
    components: {
        Checkbox,
        TransitionRoot,
        TransitionChild,
        Dialog,
        DialogOverlay,
        DialogTitle,
    },
    computed: {
        ...mapGetters('users', {
            users: 'getUsers'
        }),
    },
    methods: {
        closeModal() {
            this.$emit('closeModal');
        },
        addShift() {
            this.$emit('addShift', this.userId, this.doNotFill)
        },
        selectDoNotFill() {
            this.userId = this.userId ? null : this.userId;
            this.selectDisabled = !this.selectDisabled;
        }
    }
}
</script>

<style scoped>

</style>
