<template>
    <div>
        <div>
            <label>
                Narrow Your Search
                <select class="form-control" @change="refreshItems" v-model="search">
                    <option value="">All</option>
                    <option v-for="category in categories" :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
            </label>
        </div>
        <div class="items row">
            <template v-for="(item, index) in items">
                <div class="col">
                    <item @claim="sendClaim" :canClaim="claims" :index="index + 1" :item="item"></item>
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
        props: {
            claims: Boolean
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
                    window.setTimeout(() => {
                        this.items = [];
                        this.refreshItems();
                    }, 1000);
                });
            },
            refreshItems() {
                let query = '/goods/';

                if (this.search) {
                    query += '?category=' + this.search;
                }
                window.axios.get(query).then((response) => {
                    this.items = response.data.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>
