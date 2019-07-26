<template>
    <div class="top-right" v-on:logged-in="logIn">
        <a href="/"><img src="/img/sugarshare.png" alt="Sugar Share"><br><img src="/img/spoon.png" alt="Sugar Share Spoon"></a>
        <div class="links float-right">
            <a href="/browse">Browse</a>
            <template v-if="!user.id">
                <a href="#" @click="showRegistration">Start Sharing</a>
                <a href="#" @click="showLogin">Keep Sharing</a>
            </template>
            <template v-else>
                <a href="/share/">Share</a>
                <a :href="'/profile/' + user.id">{{ user.name }}</a>
            </template>
        </div>
        <modals-container></modals-container>
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
        data() {
            return {
                user: this.initialUser,
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
    .links {
        display: inline-block;
    }
</style>

