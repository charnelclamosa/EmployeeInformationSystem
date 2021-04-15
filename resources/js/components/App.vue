<template>
<v-app>
    <router-view name="nav"></router-view>
    <transition name="fade">
        <router-view></router-view>
    </transition>
    <!-- <router-view name="footer"></router-view> -->
    <notifications group="app" position="bottom right" />
</v-app>
</template>
<script>
export default {
    
}
</script>
<style>
.fade-enter-active,
.fade-leave-active {
    transition-property: opacity;
    transition-duration: .50s;
}

.fade-enter-active {
    transition-delay: .50s;
}

.fade-enter,
.fade-leave-active {
    opacity: 0
}

</style>