<template>
    <button
            class="min-h-person text-red-600 text-sm hover:underline block" tabindex="-1"
            type="button"
            @click="openModal"
    >
        {{ displayText }}
    </button>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
    name: 'ShiftPersonAdminButton',
    props: {
        personItem: {
            type: Object,
            required: true
        },
    },
    computed: {
        ...mapGetters('users', {
           users: 'getUsers'
        }),
        displayText() {
            let text = '';
            if (this.personItem.hasOwnProperty('id')) {
                text = this.personItem.user.name;
            } else {
                text = 'Add Person'
            }

            return text;
        }
    },
    methods: {
        openModal() {
            if (this.personItem.hasOwnProperty('id')) {
                this.$emit('deleteShift');
            } else {
                // This slot has someone signed up.
                this.$emit('openModal', this.item);
            }
        }
    }
}
</script>
