<template>
    <HereMap></HereMap>
</template>

<script>

    import HereMap from './components/HereMap'
    var vm = window.vm

    export default {
        name: 'app',
        data: () => ({
        }),
        components: {
            HereMap,

        }
    }
</script>

<style>
    img.logo {
        width: 32px;
    }
</style>
