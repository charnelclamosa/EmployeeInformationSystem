<template>
    <div id="login">
        <v-card>
            <div class="image">
                
            </div>
            <div class="content">
                <v-text-field dense label="Username" v-model="User.Username"></v-text-field>
                <v-text-field dense label="Password" v-model="User.Password"></v-text-field>
                <primary-button @click.native="authenticate()" text="Login"></primary-button>
            </div>
        </v-card>
    </div>
</template>
<script>
export default {
    data: () => {
        return {
            User: {},
        }
    },
    methods: {
        authenticate() {
            try {
                this.$router.push({name: 'home'})
            } catch (error) {
                console.log(error);
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
}
.content {
    display: flex;
    flex-direction: column;
    padding: 2rem;
}
</style>
