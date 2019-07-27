<template>
    <div class="hero">
        <div class="title m-b-md">
            BUY <span class="separator">|</span> SELL <span class="separator">|</span> SHARE
        </div>
        <div class="horizontal-separator">
            We throw away more than 30% of all food. With SugarShare, neighbors buy, sell and share food.
        </div>
        <div class="horizontal-separator">
            <img src="/img/triangle.png" alt="Triangle of SugarShare">
        </div>
        <div class="m-b-md">
            <img class="float-left bullet" src="/img/advocado.png"/>
            <div>
                Have to travel suddenly and those avocados you bought are going to be toast?
            </div>
            <div>
                Share it on SugarShare.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="m-b-md">
            <img class="float-left bullet" src="/img/soda.png" alt="soda can">
            <div>
                Didn’t like those new energy drinks but you have five left?
            </div>
            <div>
                Sell them on SugarShare!
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="m-b-md">
            <img class="float-left bullet" src="/img/sugar.png" alt="sugar jar">
            <div>
                Need some sugar to finish the cookies you promised your best friend?
            </div>
            <div>
                Buy it on SugarShare!
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Hero"
    }
</script>

<style scoped>
    .hero {
        font-size: x-large;
    }

    img.bullet {
        padding-right: 2rem;
    }
</style>
