<template>
    <div>
        <div class="horizontal-separator">
            <div><i class="block fas fa-user fa-9x flex-center"></i></div>
            <div class="flex-center">Hi {{ user.name }}</div>
            <div><button class="btn" @click="logOut">Log Out</button></div>
        </div>
        <div class="justify left">
            <address-form :user="user.id" v-model="user.address || {}"></address-form>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Profile",
        props: {
            user: {
                type: Object,
                default: () => {
                    return {
                        address: {
                            city: undefined,
                            postal_code: undefined
                        }
                    }
                }
            },
            edit: {
                type: Boolean,
                default: false
            }
        },
        methods: {
            logOut() {
                window.axios.post('/logout/').then(() => {
                    window.location = '/';
                })
            }
        },
        components: {
            'address-form': (resolve) => {
                require(['./AddressForm'], resolve)
            },
        }
    }
</script>

<style scoped>
    i.block {
        display: block;
    }

    div.justify.left {
        text-align: left;
    }
</style>
