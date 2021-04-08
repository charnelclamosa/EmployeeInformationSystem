<template>
    <v-btn tile block :disabled="disabled" color="primary">{{text}}</v-btn>
</template>
<script>
export default {
    props: {
        text: {
            type: String
        },
        disabled: {
            type: Boolean
        }
    }
}
</script>