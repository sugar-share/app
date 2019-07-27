<template>
    <div>
        <div class="title">Post Your Food</div>
        <div class="form-group">
<!--            <div class="row">-->
<!--                <label class="col" for="item_photo">Upload an Image</label>-->
<!--                <input type="file" class="form-control-file col" id="item_photo">-->
<!--            </div>-->

            <div class="row">
                <label class="col" for="description">Enter a Description of Product</label>
                <textarea class="col" name="description" v-model="item.description" id="description"></textarea>
            </div>
            <!--            <label>Condition: <select v-if="conditions.length" v-model="item.condition">-->
            <!--                <option v-for="condition in conditions" :value="condition.id">{{ condition.name }}</option>-->
            <!--            </select><i v-else class="fas fa-circle-notch fa-spin"></i></label>-->
            <div class="row">
                <label class="col" for="category">Please Choose a Category</label>
                <select class="col" v-model="item.category" name="category" id="category">
                    <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                </select>
            </div>
            <div class="row">
                <label class="col" for="price">Choose Your Price</label>
                <div class="col" style="text-align: left;">
                    <input id="price" v-model="item.price" name="price">
                    <label>or Set as Free: <input type="checkbox" v-model="item.free"></label>
                </div>

            </div>
            <div class="row">
                <label for="trades" class="col">Will Accept Trades </label>
                <input id="trades" class="col" type="checkbox" v-model="item.will_trade">
            </div>
            <div>
                <button class="btn" @click="share">Share</button>
            </div>
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
                conditions: [],
                categories: [],
            }
        },
        mounted() {
            window.axios.get('/api/conditions').then((response) => {
                this.conditions = response.data;
                this.item.condition = this.conditions[0].id;
            });
            window.axios.get('/api/categories').then((response) => {
                this.categories = response.data;
            });
        },
        methods: {
            share() {
                window.axios.post(
                    '/goods/',
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

    .row {
        padding-bottom: 1rem;
    }

    .col {
        padding: 0;
        text-align: left;
    }
</style>
