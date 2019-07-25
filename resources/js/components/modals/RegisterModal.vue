<template>
    <div class="modal content">
        <div class="header">
            Start Sharing
        </div>
        <div class="body">
            <label>Name: <input v-model="name"></label>
            <label>Email: <input v-model="email"/></label>
            <label>Password: <input type="password" v-model="password"/></label>
        </div>
        <div class="footer">
            <div class="cancel button" @click="$emit('close')">Cancel</div>
            <div class="confirm button" @click="register">Start Sharing</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Register",
        props: {},
        data() {
            return {
                name: undefined,
                email: undefined,
                password: undefined,
            };
        },
        computed: {
            password_confirmation: function () {
                return this.password;
            }
        },
        mounted() {
        },
        methods: {
            register: function () {
                window.axios.post('/register/', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password
                }).then((response) => {
                    if (response.data.user) {
                        this.$emit('logged-in', response.data.user)
                    }
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
