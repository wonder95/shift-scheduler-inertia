<template>
    <div class="flex justify-center">
        <button class="text-red-600 hover:underline block" tabindex="-1"
                type="button"
                @click="linkActionMethod"
        >
            {{ signupText }}
        </button>
    </div>
</template>

<script>
export default {
    name: 'ShiftPerson',
    props: {
        item: {
            type: Object,
            required: true
        },
        date: String,
        user: Object
    },
    computed: {
        signupText() {
            return this.item.hasOwnProperty('id') ? this.item.user.name : 'Sign Up';
        },
        linkActionMethod(){
            return this.item.hasOwnProperty('id') ? 'destroy' : 'signup';
        }
    },
    methods: {
        destroy() {
            if (confirm('Are you sure you want to delete this shift?')) {
                this.$inertia.delete(this.route('shifts.delete', this.item.id))
            }
        },
        signup() {
            const signupData = {
                user_id: this.user.id,
                date: this.date,
                station_id: this.item.station_id,
                am_pm: this.item.am_pm,
                redirectRoute: 'shifts.calendar'
            }

            this.$inertia.post(this.route('shifts.store', signupData))
        }
    }
}
</script>
