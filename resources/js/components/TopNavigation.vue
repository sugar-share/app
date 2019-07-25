<template>
    <div class="top-right links" v-on:logged-in="logIn">
        <template v-if="!this.user">
            <a href="#" @click="showRegistration">Start Sharing</a>
            <a href="#" @click="showLogin">Keep Sharing</a>
        </template>
        <template v-else>
            <a :href="'/profile/' + user.id">{{ user.name }}</a>
        </template>
        <modals-container v-on:logged-in="logIn"></modals-container>
    </div>
</template>

<script>
    import RegisterModal from "./modals/RegisterModal";
    import LoginModal from "./modals/LoginModal";

    export default {
        name: "TopNavigation",
        props: {
            initialUser: {
                type: Object,
                default: () => {
                    return {};
                }
            }
        },
        data: () => {
            return {
                user: undefined,
            }
        },
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
            },
            logIn(event) {
                this.user = event;
            }
        }
    }
</script>

<style scoped>

</style>

