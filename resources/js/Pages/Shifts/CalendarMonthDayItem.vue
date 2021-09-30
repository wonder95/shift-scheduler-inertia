<template>
    <li
        class="relative calendar-day min-h-calendar text-base p-2"
        :class="{
        'text-gray-500 bg-gray-200': !day.isCurrentMonth,
        'pt-3 border border-green-500 border-2': isToday
    }"
    >
        <span
            :class="{'bg-blue-900 text-white rounded-full p-3': isToday }"
            class="flex justify-center items-center absolute right-0.5 w-5 h-5"
        >
            {{ label }}
        </span>
        <ShiftDay
            :shifts="shifts"
            :date="day.date"
        ></ShiftDay>
    </li>
</template>`

<script>
import dayjs from "dayjs";
import ShiftDay from "@/Pages/Shifts/ShiftDay";

export default {
    name: "CalendarMonthDayItem",

    components: {
        ShiftDay
    },

    props: {
        day: {
            type: Object,
            required: true
        },

        isCurrentMonth: {
            type: Boolean,
            default: false
        },

        isToday: {
            type: Boolean,
            default: false
        }
    },

    computed: {
        label() {
            return dayjs(this.day.date).format("D");
        },
        shifts() {
            return this.day.hasOwnProperty('shifts') ?  this.day.shifts: {};
        }
    }
};
</script>
