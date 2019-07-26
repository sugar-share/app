<template>
    <div>
        <sugar-input @input="change" :name="'city'" v-model="value.city"><template slot="label">City</template></sugar-input>
        <sugar-input @input="change" :name="'postal_code'" v-model="value.postal_code"><template slot="label">Postal Code</template></sugar-input>
    </div>
</template>

<script>
    export default {
        name: "AddressForm",
        props: {
            value: {
                type: Object,
                default: () => {
                    return {};
                }
            },
            user: Number
        },
        methods: {
            change(event) {
                this.value[event.name] = event.value;
                this.save(); // TODO This needs to be debounced on the client side.
            },
            save() {
                window.axios.post(
                    '/api/user/' + this.user + '/address/',
                    this.value
                )
            }
        },
        components: {
            'suger-input': (resolve) => {
                require(['./SugarInput'], resolve)
            },
        }
    }
</script>

<style scoped>

</style>
