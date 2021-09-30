<template>
    <div class="flex text-gray-800 select-none cursor-pointer">
        <span class="mr-5" @click.prevent="selectPrevious">&lt;</span>
        <span @click="selectCurrent">Today</span>
        <span  class="ml-5" @click.prevent="selectNext">&gt;</span>
    </div>
</template>

<script>
import dayjs from "dayjs";

export default {
    name: "CalendarDateSelector",

    props: {
        currentDate: {
            type: String,
            required: true
        },

        selectedDate: {
            type: Object,
            required: true
        }
    },

    methods: {
        selectPrevious() {
            let newSelectedDate = dayjs(this.selectedDate).subtract(1, "month");
            this.$emit("dateSelected", newSelectedDate);
        },

        selectCurrent() {
            let newSelectedDate = dayjs(this.currentDate);
            this.$emit("dateSelected", newSelectedDate);
        },

        selectNext() {
            let newSelectedDate = dayjs(this.selectedDate).add(1, "month");
            this.$emit("dateSelected", newSelectedDate);
        }
    }
};
</script>
