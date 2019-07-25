<template>
    <div>
        <div>
            <sugar-input v-model="item.description">
                <template slot="label">Description</template>
            </sugar-input>
            <label>Condition: <select v-if="conditions.length" v-model="item.condition">
                <option v-for="condition in conditions" :value="condition.id">{{ condition.name }}</option>
            </select><i v-else class="fas fa-circle-notch fa-spin"></i></label>
            <sugar-input v-model="item.category">
                <template slot="label">Category</template>
            </sugar-input>
        </div>
        <div>
            <button class="btn" @click="share">Share</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ShareForm",
        data() {
            return {
                item: {},
                conditions: []
            }
        },
        mounted() {
            window.axios.get('/api/conditions').then((response) => {
                this.conditions = response.data;
                this.item.condition = this.conditions[0].id;
            });
        },
        methods: {
            share() {
                window.axios.post(
                    '/api/goods/',
                    this.item
                ).then((response) => {
                    window.location = '/home';
                });
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
