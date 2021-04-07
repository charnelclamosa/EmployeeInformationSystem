<template>
<div id="login">
    <v-card tile class="form">
        <div class="image">
            <div>
                <v-img src="/images/login-logo.svg" eager alt="" width="440"></v-img>
            </div>
        </div>
        <div class="content">
            <h4 class="mb-4">Employee Information System</h4>
        <v-text-field dense label="Username" v-model="user.username" :error-messages="usernameValidation" @blur="$v.user.username.$touch()" @keyup.enter="authenticate(user)"></v-text-field>
        <v-text-field dense label="Password" v-model="user.password" :error-messages="passwordValidation" @blur="$v.user.password.$touch()" @keyup.enter="authenticate(user)"></v-text-field>
        <primary-button @click.native="authenticate(user)" text="Login"></primary-button>
        </div>
    </v-card>
</div>
</template>

<script>
import {
    required
} from 'vuelidate/lib/validators';
export default {
    data: () => {
        return {
            user: {},
        }
    },
    validations: {
        user: {
            username: {
                required
            },
            password: {
                required
            }
        }
    },
    computed: {
        usernameValidation() {
            const errors = [];
            if (!this.$v.user.username.$dirty) return errors;
            !this.$v.user.username.required && errors.push('This field is required.');
            return errors;
        },
        passwordValidation() {
            const errors = [];
            if (!this.$v.user.password.$dirty) return errors;
            !this.$v.user.password.required && errors.push('This field is required.');
            return errors;
        },
    },
    methods: {
        notification(type, message) {
            this.$notify({
                group: 'app',
                type: type,
                title: type == 'success' ? 'Success notification' : 'Error notification',
                text: message
            });
        },
        async authenticate(user) {
            this.$v.user.$touch();
            if (this.$v.user.$invalid) return;
            try {
                const response = await axios.post('api/login', {
                    username: user.username,
                    password: user.password
                });
                this.notification('success', 'Login successful.');
                // this.$router.push({name: 'home'})
            } catch (error) {
                console.log(error);
                this.notification('error', 'Login failed.');
            }
        }
    }
}
</script>

<style scoped>
#login {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background: url('/images/circles.svg');
    background-size: cover;
}
.form {
    display: flex;
    justify-content: center;
    background-image: linear-gradient(to top, #dfe9f3 0%, white 100%);
    height: 50%;
    width: 70%;
}
.image {
    display: flex;
    flex: auto;
    align-items: center;
    justify-content: center;
}

.content {
    display: flex;
    flex-direction: column;
    width: 30%;
    padding: 4rem 1.5rem;
    border: 1.5px solid dodgerblue;
}
.content h3 {
    font-size: smaller;
    text-align: center;
}
</style>
