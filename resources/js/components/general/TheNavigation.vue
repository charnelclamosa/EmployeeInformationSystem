<template>
<v-main>
    <v-app-bar dense app light color="#ffffff">
        <!-- System logo -->
        <v-toolbar-title class="font-weight-bold">
            <span>{{SystemName}}</span>
        </v-toolbar-title>
        <v-spacer />
        <!-- Navbar links -->
        <v-toolbar-items>
            <v-tooltip bottom>
                <template v-slot:activator="{ on, attrs }">
                    <v-btn x-small icon color="error" class="px-6" v-bind="attrs" v-on="on" @click="logout()">
                <v-icon>mdi-exit-to-app</v-icon>
            </v-btn>
                </template>
                <span>Logout</span>
            </v-tooltip>
        </v-toolbar-items>
    </v-app-bar>
</v-main>
</template>

<script>
export default {
    data() {
        return {
            SystemName: 'Employee Information',
            routes: [{
                    name: 'Persons',
                    route: '/#'
                },
                {
                    name: 'Users',
                    route: '/#'
                },
            ],
        }
    },
    created() {

    },
    methods: {
        logout() {
            console.log('test')
        }
    }
}
</script>

<style scoped>
</style>
