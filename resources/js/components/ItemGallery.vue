<template>
    <div>
        <div>
            <label>
                Narrow Your Search
                <select @change="refreshItems" v-model="search">
                    <option v-for="category in categories" :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
            </label>
        </div>
        <div class="items row">
            <template v-for="item in items">
                <div class="col">
                    <item @claim="sendClaim" :item="item"></item>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ItemGallery",
        data: () => {
            return {
                items: [],
                search: null,
                categories: []
            };
        },
        mounted() {
            this.refreshItems();
            window.axios.get('/api/categories').then((response) => {
                this.categories = response.data;
            });
        },
        components: {
            'item': (resolve) => {
                require(['./Item'], resolve)
            },
        },
        methods: {
            sendClaim(event) {
                window.axios.post(
                    '/claims/',
                    event
                ).then(() => {
                    window.setTimeout(this.refreshItems, 1000);
                });
            },
            refreshItems() {
                let query = '/goods/';

                if (this.search) {
                    query += '?category=' + this.search;
                }
                window.axios.get(query).then((response) => {
                    console.log(response);
                    this.items = response.data.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>
