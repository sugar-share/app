<template>
    <div class="card" style="width: 18rem;">
        <!--        <img src="" class="card-img-top" alt="">-->
        <div class="card-body">
            <h5 class="card-title">{{ item.description }}</h5>
            <div class="card-text">
                <!--                <div>Condition {{ item.condition.name }}</div>-->
                <div>
                    <div v-if="item.price" class="float-right small">
                        <i class="fas fa-comment-dollar"></i> {{ item.price }}
                    </div>
                    <div v-if="item.will_trade" class="float-right small">
                        <i class="fas fa-comment-dots"></i> Trade
                    </div>
                    <div v-if="item.free" class="float-right small">
                        <i class="fas fa-comment"></i> Free
                    </div>
                </div>
            </div>
        </div>
        <div @click="claim" class="card-footer">
            Claim
        </div>
    </div>
</template>

<script>
    import Claimed from "./modals/ClaimedModal";

    export default {
        name: "Item",
        props: {
            'item': {
                type: Object,
                default: () => {
                    return {};
                }
            }
        },
        methods: {
            claim() {
                this.$modal.show(
                    Claimed,
                    {
                        owner: this.item.user,
                    },
                    {
                        adaptive: true,
                        height: 'auto',
                        clickToClose: false,
                    }
                );
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
        cursor: pointer;
    }
</style>
