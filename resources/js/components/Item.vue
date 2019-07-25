<template>
    <div class="card" style="width: 18rem;">
<!--        <img src="" class="card-img-top" alt="">-->
        <div class="card-body">
            <h5 class="card-title">{{ item.description }}</h5>
            <div class="card-text">
                <div>Condition {{ item.condition.name }}</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Item",
        props: {
            'item': Object
        }
    }
</script>

<style scoped>
.card {
    margin-top: 3rem;
}
</style>
