<template>
    <div class="card" style="width: 18rem;">
        <!--        <img src="" class="card-img-top" alt="">-->
        <div class="card-body">
            <h5 class="card-title">{{ item.description }}</h5>
            <div ref="card-text" class="card-text">
                <img class="item image" :src="'http://lorempixel.com/200/200/food/' + index" alt="Item Photo">
                <div class="indicators" v-if="!claimed">
                    <template v-if="item.price">
                        <i class="fas fa-comment-dollar"></i> {{ item.price | toUSD }}
                    </template>
                    <template v-if="item.will_trade">
                        <i class="fas fa-comment-dots"></i> Trade
                    </template>
                    <template v-if="item.free">
                        <i class="fas fa-comment"></i> Free
                    </template>
                    <template>
                        <i :class="'fas ' + item.category.icon"></i>
                    </template>
                </div>
                <div v-else>
                    <div class="title">Claimed!</div>
                    <div>
                        <!-- TODO Get the Email from the API response, don't send them all to clientside. -->
                        <!--   This holds true of all models returned to the client, they leak data. -->
                        Look for an email from {{ item.user.name }} to start arranging for delivery.
                    </div>
                </div>
            </div>
        </div>
        <div @click="claim" class="card-footer" :style="'cursor: ' + cursor + ';'">
            Claim
        </div>
    </div>
</template>

<script>
    export default {
        name: "Item",
        props: {
            'item': {
                type: Object,
                default: () => {
                    return {};
                }
            },
            index: Number
        },
        data() {
            return {
                claimed: false,
                loaded: false
            }
        },
        methods: {
            claim() {
                if (!this.claimed) {
                    this.claimed = true;
                    this.$emit('claim', this.item)
                }
            }
        },
        computed: {
            cursor() {
                return this.claimed ? 'no-drop' : 'pointer';
            }
        },
        filters: {
            toUSD(value) {
                return `$${Number.parseFloat(value).toFixed(2).toLocaleString()}`
            }
        }
    }
</script>

<style scoped>
    .card {
        margin-top: 3rem;
    }

    i {
        padding-left: 0.25rem;
        padding-right: 0.25rem;
    }

    .card-footer {
        background-color: rgb(237, 168, 72);
        color: white;
    }

    .title {
        font-size: medium;
    }

    .card-title {
        height: 100px;
        overflow-y: scroll;
        scroll-behavior: auto;
    }

    .card-text > img {
        max-height: 200px;
    }

    .item.image {
        min-height: 200px;
    }
</style>
