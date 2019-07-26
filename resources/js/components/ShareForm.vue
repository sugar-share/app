<template>
    <div>
        <div class="title">List Unwanted Goods</div>
        <div class="form-group">
            <label for="item_photo">Upload an Image</label>
            <input type="file" class="form-control-file" id="item_photo">

            <sugar-input v-model="item.description">
                <template slot="label">Description</template>
                <textarea slot="input"></textarea>
            </sugar-input>
            <label>Condition: <select v-if="conditions.length" v-model="item.condition">
                <option v-for="condition in conditions" :value="condition.id">{{ condition.name }}</option>
            </select><i v-else class="fas fa-circle-notch fa-spin"></i></label>
            <!--            <sugar-input v-model="item.category">-->
            <!--                <template slot="label">Category</template>-->
            <!--            </sugar-input>-->
            <sugar-input v-model="item.price">
                <template slot="label">Price</template>
            </sugar-input>
            <label>Will Trade: <input type="checkbox" v-model="item.will_trade"></label><br>
            <label>Free: <input type="checkbox" v-model="item.free"></label>
        </div>
        <div>
            <button class="btn" @click="share">Share</button>
        </div>
    </div>
</template>

<script>
    import SugarInput from "./SugarInput";

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
            SugarInput,
            'suger-input': (resolve) => {
                require(['./SugarInput'], resolve)
            },
        }
    }
</script>

<style scoped>
.form-control-file {
    width: unset;
    display: inline;
}
</style>
