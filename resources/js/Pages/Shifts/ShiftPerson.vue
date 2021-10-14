<template>
    <div class="flex justify-center px-10 mt-1 hover:bg-gray-300">
        <div class="min-h-person hover:bg-gray-300 text-sm" v-if="isBefore">{{ signupText }}</div>

        <ShiftPersonAdminButton
            v-else-if="userIsAdmin"
            :person-item="item"
            @openModal="openModal"
            @deleteShift="destroy"
        ></ShiftPersonAdminButton>

        <div class="min-h-person hover:bg-gray-300 text-sm" v-else-if="!shiftIsForUser">{{ signupText }}</div>

        <button v-else
                class="text-red-600 text-sm hover:underline block" tabindex="-1"
                type="button"
                @click="runAction(linkActionMethod)"
        >
            {{ signupText }}
        </button>

        <AdminUserAddShiftModal
            :is-open="isOpen"
            @closeModal="closeModal"
            @addShift="signup"
            :date="date"
            :station="item.station.station_number"
            :am_pm="item.am_pm"
        >
        </AdminUserAddShiftModal>
    </div>
</template>

<script>
import dayjs from "dayjs";
import ShiftPersonAdminButton from '@/Pages/Shifts/ShiftPersonAdminButton'
import AdminUserAddShiftModal from "@/Pages/Shared/AdminUserAddShiftModal";

export default {
    name: 'ShiftPerson',
    data() {
        return {
            isOpen: false,
            form: this.$inertia.form({
                user_id: null
            })
        }
    },
    props: {
        item: {
            type: Object,
            required: true
        },
        date: String,
        user: Object
    },
    components: {
        ShiftPersonAdminButton,
        AdminUserAddShiftModal
    },
    computed: {
        signupText() {
            let text = '';
            if (this.item.hasOwnProperty('id')) {
                text = this.item.user_id ?  this.item.user.name : 'Unavailable';
            } else if (!this.isBefore) {
                if (this.userIsAdmin) {
                    return 'Add User';
                } else {
                    return 'Sign Up';
                }
            }

            return text;
        },
        linkActionMethod() {
            return this.item.hasOwnProperty('id') ? 'destroy' : 'signup';
        },
        isBefore() {
            return dayjs(this.date).isBefore(dayjs(), 'day');
        },
        userIsAdmin() {
            return this.$page.props.user.type === 'admin';
        },
        shiftIsForUser() {
            let show = true;
            if (this.item.hasOwnProperty('user_id')) {
                if (this.item.user_id !== this.$page.props.user.id) {
                    show =false;
                }
            }

            return show;
        }
    },
    methods: {
        closeModal() {
            this.isOpen = false
        },
        openModal() {
            this.isOpen = true
        },
        runAction(method) {
            this[method]();
        },
        destroy() {
            if (confirm('Are you sure you want to delete this shift?')) {
                this.$inertia.delete(this.route('shifts.delete', this.item.id))
            }
        },
        signup(modalUserId = null, unavailable = null) {
            let user_id = '';
            if (unavailable) {
                user_id = null;
            } else {
                user_id = modalUserId ?  modalUserId : this.$page.props.user.id;
            }

            const signupData = {
                user_id: user_id,
                date: this.date,
                station_id: this.item.station_id,
                am_pm: this.item.am_pm,
                unavailable: unavailable,
                redirectRoute: 'shifts.calendar'
            }

            this.$inertia.post(this.route('shifts.store', signupData, {preserveScroll: true}))

            this.closeModal();
        }
    }
}
</script>
