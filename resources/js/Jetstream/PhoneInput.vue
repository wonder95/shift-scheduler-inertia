<template>
    <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
           type="tel"
           :value="modelValue"
           :maxlength="maxlength"
           :size="size"
           @input="$emit('update:modelValue', $event.target.value)"
           ref="input">
</template>

<script>
    export default {
        props: {
            modelValue: {
                type: String,
                required: true
            },
            pattern:{
                type:  String,
                required: false,
                default: '[0-9]{3}-[0-9]{3}-[0-9]{4}'
            },
            maxlength: {
                type: Number,
                required: true
            },
            size: {
                type: Number,
                required: true
            }
        },

        emits: ['update:modelValue'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

