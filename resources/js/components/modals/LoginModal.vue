<template>
    <div class="modal content">
        <div class="header">
            Keep Sharing
        </div>
        <div class="body">
            <label>Email: <input v-model="email"/></label>
            <label>Password: <input type="password" v-model="password"/></label>
        </div>
        <div class="footer">
            <div class="cancel button" @click="$emit('close')">Cancel</div>
            <div class="confirm button" @click="login">Keep Sharing</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        props: {},
        data() {
            return {
                email: undefined,
                password: undefined,
            };
        },
        mounted() {
        },
        methods: {
            login: function () {
                window.axios.post('/login/', {
                    email: this.email,
                    password: this.password
                }).then(() => {
                    this.$emit('close');
                });
            },
        },
    }
</script>

<style scoped>
    .modal {
        height: initial;
        position: inherit;
        display: inherit;
    }

    .modal .body, .modal .header {
        padding: 1rem;
    }

    .modal .header {
        font-weight: 600;
        font-size: larger;
        border-bottom: 1px solid grey;
        background: lightgray;
    }

    .modal .footer {
        display: flex;
        justify-content: space-around;
    }

    .button {
        display: inline-block;
        text-align: center;
        padding: 1rem;
        width: 100%;
        border-top: 1px solid grey;
        border-right: 1px solid grey;
    }

    .button:last-of-type {
        border-right: 0;
    }
</style>
