<template>
    <v-btn tile outlined :disabled="disabled" :loading="loading" color="error">{{text}}</v-btn>
</template>
<script>
export default {
    props: {
        text: {
            type: String
        },
        disabled: {
            type: Boolean
        },
        loading: {
            type: Boolean
        }
    }
}
</script>