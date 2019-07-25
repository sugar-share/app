<template>
    <div class="sugar input">
        <label><slot name="label"></slot>
            <input @input="$emit('input', $event.target.value)" :name="name" :value="value" />
        </label>
    </div>
</template>

<script>
    export default {
        name: "SugarInput",
        props: {
            edit: {
                type: Boolean,
                default: false
            },
            value: String,
            name: String,
        }
    }
</script>

<style scoped>

</style>
