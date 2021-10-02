<template>
    <app-layout>
        <div class="container mx-auto border border-gray-400">
            <div class="p-8 justify-between flex bg-white border border-gray-400">
                <CalendarDateIndicator
                    :selected-date="selectedDate"
                    class="calendar-month-header-selected-month"
                />

                <CalendarDateSelector
                    :current-date="today"
                    :selected-date="selectedDate"
                    @dateSelected="selectDate"
                />
            </div>

            <CalendarWeekdays/>

            <ol class="grid grid-cols-7 h-full grid relative gap-0 border border-solid border-t-2 border-black">
                <CalendarMonthDayItem
                    v-for="day in days"
                    :key="day.date"
                    :day="day"
                    :is-today="day.date === today"
                />
            </ol>
        </div>
    </app-layout>
</template>

<script>
import dayjs from "dayjs";
import weekday from "dayjs/plugin/weekday";
import weekOfYear from "dayjs/plugin/weekOfYear";
import AppLayout from "@/Layouts/AppLayout";
import CalendarMonthDayItem from "./CalendarMonthDayItem";
import CalendarDateIndicator from "./CalendarDateIndicator";
import CalendarDateSelector from "./CalendarDateSelector";
import CalendarWeekdays from "./CalendarWeekdays";

dayjs.extend(weekday);
dayjs.extend(weekOfYear);

export default {
    name: "CalendarMonth",

    components: {
        AppLayout,
        CalendarMonthDayItem,
        CalendarDateIndicator,
        CalendarDateSelector,
        CalendarWeekdays
    },

    data() {
        return {
            selectedDate: dayjs(),
            dayParts: ['am', 'pm']
        };
    },

    props: {
        shifts: Object,
        stations: Array
    },

    computed: {
        numShifts() {
            return this.shifts.length;
        },
        days() {
            return [
                ...this.previousMonthDays,
                ...this.currentMonthDays,
                ...this.nextMonthDays
            ];
        },

        today() {
            return dayjs().format("YYYY-MM-DD");
        },

        month() {
            return Number(this.selectedDate.format("M"));
        },

        year() {
            return Number(this.selectedDate.format("YYYY"));
        },

        numberOfDaysInMonth() {
            return dayjs(this.selectedDate).daysInMonth();
        },

        currentMonthDays() {
            return [...Array(this.numberOfDaysInMonth)].map((day, index) => {
                const date = dayjs(`${this.year}-${this.month}-${index + 1}`).format(
                    "YYYY-MM-DD"
                );
                const dateObj = {
                    date: date,
                    isCurrentMonth: true
                };

                if (this.shifts.hasOwnProperty(date)) {
                    dateObj.shifts = this.mergeShifts(this.shifts[date], date);
                } else {
                    dateObj.shifts = this.generateShiftStructure();
                }

                return dateObj;
            });
        },

        previousMonthDays() {
            const firstDayOfTheMonthWeekday = this.getWeekday(
                this.currentMonthDays[0].date
            );

            const previousMonth = dayjs(`${this.year}-${this.month}-01`).subtract(
                1,
                "month"
            );

            // Cover first day of the month being sunday (firstDayOfTheMonthWeekday === 0)
            const visibleNumberOfDaysFromPreviousMonth = firstDayOfTheMonthWeekday
                ? firstDayOfTheMonthWeekday
                : 6;

            const previousMonthLastMondayDayOfMonth = dayjs(
                this.currentMonthDays[0].date
            )
                .subtract(visibleNumberOfDaysFromPreviousMonth, "day")
                .date();

            return [...Array(visibleNumberOfDaysFromPreviousMonth)].map(
                (day, index) => {
                    const date = dayjs(
                        `${previousMonth.year()}-${previousMonth.month() +
                        1}-${previousMonthLastMondayDayOfMonth + index}`
                    ).format("YYYY-MM-DD");

                    let dateObj = {
                        date: date,
                        isCurrentMonth: false
                    };

                    if (this.shifts.hasOwnProperty(date)) {
                        dateObj.shifts = this.mergeShifts(this.shifts[date], date);
                    } else {
                        dateObj.shifts = this.generateShiftStructure();
                    }

                    return dateObj;
                }
            );
        },

        nextMonthDays() {
            const lastDayOfTheMonthWeekday = this.getWeekday(
                `${this.year}-${this.month}-${this.currentMonthDays.length + 1}`
            );

            const nextMonth = dayjs(`${this.year}-${this.month}-01`).add(1, "month");

            const visibleNumberOfDaysFromNextMonth = lastDayOfTheMonthWeekday
                ? 7 - lastDayOfTheMonthWeekday
                : lastDayOfTheMonthWeekday;

            return [...Array(visibleNumberOfDaysFromNextMonth)].map((day, index) => {
                const date = dayjs(
                    `${nextMonth.year()}-${nextMonth.month() + 1}-${index + 1}`
                ).format("YYYY-MM-DD");

                let dateObj = {
                    date: date,
                    isCurrentMonth: false
                };

                if (this.shifts.hasOwnProperty(date)) {
                    dateObj.shifts = this.mergeShifts(this.shifts[date], date);
                } else {
                    dateObj.shifts = this.generateShiftStructure();
                }

                return dateObj;
            });
        }
    },

    methods: {
        generateShiftStructure() {
            let structure = {};

            this.dayParts.forEach(part => {
                structure[part] = {};
                this.stations.forEach(station => {
                    const shiftData = {
                        am_pm: part,
                        station_id: station.id,
                        user: {
                            name: 'Sign Up'
                        },
                        station: {
                            station_number: station.station_number
                        }
                    };
                    let parts = Array(3);
                    structure[part][station.station_number] = parts.fill(shiftData)
                })
            })
            return structure;
        },
        mergeShifts(shifts, date) {
            const vm = this;
            const todayShifts = this.shifts[date];
            // let tempShiftStructure = Object.assign({}, this.shiftStructure);
            let tempShiftStructure = this.generateShiftStructure();

            this.dayParts.forEach(part => {
                if (shifts.hasOwnProperty(part)) {
                    const partShifts = shifts[part];
                    Object.keys(partShifts).forEach(station => {
                        const numReplaceShifts = shifts[part][station].length;
                        tempShiftStructure[part][station].splice(0, numReplaceShifts, ...shifts[part][station]);
                    })
                }
            })

            return tempShiftStructure;
        },
        getWeekday(date) {
            return dayjs(date).weekday();
        },

        selectDate(newSelectedDate) {
            this.selectedDate = newSelectedDate;

            const newMonth = dayjs(this.selectedDate).month() + 1;
            const newYear = dayjs(this.selectedDate).year();

            this.$inertia.visit('calendar', {
                preserveState: true,
                data: {
                    newMonth: newMonth,
                    newYear: newYear
                },
                only: ['shifts']
            });
        }
    }
};
</script>

<style scoped>

body {
    font-family: sans-serif;
    font-weight: 100;
}
</style>
