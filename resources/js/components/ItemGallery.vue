<template>
    <div class="items row">
        <template v-for="item in items">
            <div class="col">
                <item @claim="sendClaim" :item="item"></item>
            </div>
        </template>
    </div>
</template>

<script>
    export default {
        name: "ItemGallery",
        data: () => {
            return {
                items: [],
            };
        },
        mounted() {
            this.refreshItems();
        },
        components: {
            'item': (resolve) => {
                require(['./Item'], resolve)
            },
        },
        methods: {
            sendClaim(event) {
                console.log('sending');
                window.axios.post(
                    '/claims/',
                    event
                ).then(() => {
                    window.setTimeout(this.refreshItems, 1000);
                });
            },
            refreshItems() {
                window.axios.get('/goods').then((response) => {
                    console.log(response);
                    this.items = response.data.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>
