<template>
    <v-btn tile :disabled="disabled" :loading="loading" color="primary">{{text}}</v-btn>
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