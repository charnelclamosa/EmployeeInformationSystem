<template>
<v-main class="header">
    <div class="text-uppercase title-font">
        {{title}}
    </div>
    <v-divider></v-divider>
</v-main>
</template>

<script>
export default {
    props: {
        title: {
            type: String
        }
    }
}
</script>

<style scoped>
.header {
    margin: 1rem 2rem 0 2rem;
}
</style>
