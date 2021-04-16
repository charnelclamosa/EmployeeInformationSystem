<template>
<v-card tile>
    <div class="content">
        <v-card class="content-icon" :color="color">
            <v-icon x-large class="pa-6" color="white">{{icon}}</v-icon>
        </v-card>
        <div class="content-text">
            <div class="content-text-title">{{title}}</div>
            <div class="content-text-value">{{value}}</div>
        </div>
    </div>
</v-card>
</template>

<script>
export default {
    props: {
        color: {
            type: String
        },
        icon: {
            type: String
        },
        title: {
            type: String
        },
        value: {
            type: Number
        }
    }
}
</script>

<style scoped>
.content {
    display: flex;
}
.content-icon {
    display: flex;
    justify-content: center;
    max-width: 40%;
    margin: -3rem 0 0.5rem 0rem;
}

.content-text {
    display: flex;
    flex-direction: column;
    text-align: right;
    padding: 1rem 0.5rem 1rem 0.5rem;
}

.content-text-title {
    font-size: small;
    letter-spacing: 1px;
    color: gray;
}

.content-text-value {
    font-size: x-large;
}
</style>
