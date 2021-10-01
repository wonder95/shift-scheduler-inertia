<template>
    <span class="font-bold">{{ stationNum }}</span>
        <ShiftPerson v-for="item in shifts"
            :item="item"
            :date="date"
        ></ShiftPerson>
</template>

<script>
import ShiftPerson from "@/Pages/Shifts/ShiftPerson";

export default {
    name: 'ShiftStation',
    components: {
        ShiftPerson
    },
    props: {
        shifts : {
            required: false,
            type: Array
        },
        stationNum: {
            required: true,
            type: String
        },
        date: String,
    }
}
</script>
