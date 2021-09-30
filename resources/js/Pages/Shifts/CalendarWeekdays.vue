<template>
    <ol class="day-of-week">
        <li class="text-blue-500" v-for="weekday in weekdays" :key="weekday">{{ weekday }}</li>
    </ol>
</template>

<script>
const WEEKDAYS = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

export default {
    name: "CalendarWeekdays",

    computed: {
        weekdays() {
            return WEEKDAYS;
        }
    }
};
</script>

<style scoped>
.day-of-week {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
}

.day-of-week > * {
    text-align: right;
    padding-right: 5px;
}

ol,
li {
    padding: 0;
    margin: 0;
    list-style: none;
}
</style>
