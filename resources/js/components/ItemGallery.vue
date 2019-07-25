<template>
    <div class="items row">
        <template v-for="item in items">
            <div class="col">
                <item :item="item"></item>
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
            window.axios.get('/api/goods').then((response) => {
                console.log(response);
                this.items = response.data.data;
            });
        },
        components: {
            'item': (resolve) => {
                require(['./Item'], resolve)
            },
        }
    }
</script>

<style scoped>

</style>
