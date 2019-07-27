<template>
    <div>
        <sugar-input @input="change" :name="'city'" v-model="value.city">
            <template slot="label">City</template>
        </sugar-input>
        <sugar-input @input="change" :name="'postal_code'" v-model="value.postal_code">
            <template slot="label">Postal Code</template>
        </sugar-input>
        <div v-show="recentSave" class="bg-success">
            <i class="align-middle fas fa-check-circle"></i> Saved
        </div>
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
        data() {
            return {
                recentSave: false
            }
        },
        methods: {
            change: _.debounce(function (event) {
                    this.value[event.name] = event.value;
                    this.save();
                    this.recentSave = true;
                    window.setTimeout(() => {
                        this.recentSave = false
                    }, 1000);
                },
                500
            ),
            save() {
                window.axios.post(
                    '/api/user/' + this.user + '/address/',
                    this.value
                )
            }
        },
        components: {
            'suger-input':
                (resolve) => {
                    require(['./SugarInput'], resolve)
                },
        }
    }
</script>

<style scoped>
    .bg-success {
        border-radius: 0.5rem;
        padding: 1rem;
        transition-property: display;
        display: table;
    }
</style>
