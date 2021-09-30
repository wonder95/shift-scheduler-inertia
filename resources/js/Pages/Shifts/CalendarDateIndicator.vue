<template>
    <div class="text-gray-500 text-2xl font-medium">{{ selectedMonth }}</div>
</template>

<script>
export default {
    props: {
        selectedDate: {
            type: Object,
            required: true
        }
    },

    computed: {
        selectedMonth() {
            const sm = this.selectedDate.format("MMMM YYYY");
            return sm;
        }
    }
};
</script>
