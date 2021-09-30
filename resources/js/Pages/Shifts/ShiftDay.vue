<template>
    <div>
        <template v-for="time in ['am','pm']">
            <ShiftAMPM
              :stations="shifts[time]"
              :time="time"
              :date="date"
            ></ShiftAMPM>
        </template>
    </div>
</template>

<script>
import ShiftAMPM from "@/Pages/Shifts/ShiftAMPM";

export default {
    name: 'ShiftDay',
    components: {
        ShiftAMPM
    },
    props: {
        shifts: {
            required: false,
            type: Object
        },
        date: String
    }
}
</script>

<style scoped>

</style>
