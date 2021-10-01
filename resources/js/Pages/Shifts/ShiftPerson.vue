<template>
    <div class="flex justify-center px-10 mt-1">
        <button v-if="!isBefore"
            class="text-red-600 text-sm hover:underline block" tabindex="-1"
            type="button"
            @click="runAction(linkActionMethod)"
        >
            {{ signupText }}
        </button>
        <div class="min-h-person" v-else>{{ signupText }}</div>
    </div>
</template>

<script>
import dayjs from "dayjs";

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
            let text = '';
            if (this.item.hasOwnProperty('id')) {
                text = this.item.user.name
            } else {
              if (this.isBefore){
                  text = '';
              } else {
                  text = 'Sign Up';
              }
            }

            return text;
        },
        linkActionMethod(){
            return this.item.hasOwnProperty('id') ? 'destroy' : 'signup';
        },
        isBefore() {
            const before = dayjs(this.date).isBefore(dayjs(), 'day');
            return before;
        }
    },
    methods: {
        runAction(method) {
          this[method]();
        },
        destroy() {
            if (confirm('Are you sure you want to delete this shift?')) {
                this.$inertia.delete(this.route('shifts.delete', this.item.id))
            }
        },
        signup() {
            const signupData = {
                user_id: this.$page.props.user.id,
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
