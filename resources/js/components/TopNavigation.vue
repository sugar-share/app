<template>
    <div class="top-right links">
        <a href="#" @click="showRegistration">Start Sharing</a>
        <a href="#" @click="showLogin">Keep Sharing</a>
    </div>
</template>

<script>
    import RegisterModal from "./modals/RegisterModal";
    import LoginModal from "./modals/LoginModal";

    export default {
        name: "hero",
        methods: {
            showRegistration() {
                this.$modal.show(
                    RegisterModal,
                    {},
                    {
                        adaptive: true,
                        height: 'auto',
                        clickToClose: false,
                    }
                );
            },
            showLogin() {
                this.$modal.show(
                    LoginModal,
                    {},
                    {
                        addaptive: true,
                        height: 'auto',
                        clickToClose: false
                    }
                )
            }
        }
    }
</script>

<style scoped>

</style>

