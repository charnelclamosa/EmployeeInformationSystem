<template>
    <v-btn color="primary">{{text}}</v-btn>
</template>
<script>
export default {
    props: {
        text: {
            type: String
        }
    }
}
</script>