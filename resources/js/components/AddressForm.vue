<template>
    <div>
        <sugar-input v-model="value.city"><template slot="label">City</template></sugar-input>
        <sugar-input v-model="value.postal_code"><template slot="label">Postal Code</template></sugar-input>
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
