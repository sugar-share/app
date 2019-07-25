<template>
    <div>
        <div>
            <sugar-input v-model="item.description">
                <template slot="label">Description</template>
            </sugar-input>
            <label>Condition: <select v-model="item.condition">
                <option v-for="condition in conditions" :value="condition.id">{{ condition.name }}</option>
            </select></label>
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
                this.conditions = response.data.conditions;
            });
        },
        methods: {
            share() {
                window.axios.post(
                    '/api/goods/',
                    this.item
                );
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
