<template>
    <div>
        <app-navbar />
        <slot>
            <transition name="fade">
                <router-view />
            </transition>
        </slot>
        <app-footer />
    </div>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .2s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>

<script>
    import AppNavbar from './AppNavbar';
    import AppFooter from './AppFooter';

    export default {
        name: 'app-layout',
        components: {
            AppNavbar,
            AppFooter
        }
    }
</script>