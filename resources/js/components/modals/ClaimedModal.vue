<template>
    <div class="modal content">
        <div class="header">
            Great!
        </div>
        <div class="body">
            <div>We'll start a conversation for you with the other party.</div>
            <div>Look for an email from {{ owner.name }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Claimed",
        props: {
            owner: {
                type: Object,
                default: () => {
                    return {};
                }
            }
        }
    }
</script>

<style scoped>

</style>
