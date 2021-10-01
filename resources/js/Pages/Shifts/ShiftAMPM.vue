<template>
    <div :class="bgClass" class="py-2">
        <div>{{ time.toUpperCase() }}</div>
        <span class="divide-y divide-gray-800">
            <ShiftStation v-for="(station, id) in stations"
                :shifts="stations[id]"
                :station-num="id"
                :date="date"
            ></ShiftStation>
        </span>
    </div>
</template>

<script>
import ShiftStation from "@/Pages/Shifts/ShiftStation";

export default {
    name: 'ShiftAMPM',
    components: {
        ShiftStation
    },
    props: {
        stations: Object,
        date: String,
        time: {
            type: String,
            required: true
        }
    },
    computed: {
        bgClass() {
            return this.time === 'am' ? 'bg-yellow-100' : 'bg-blue-200';
        }
    }
}
</script>
