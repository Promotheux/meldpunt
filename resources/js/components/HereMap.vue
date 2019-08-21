<template>
    <div class="here-map">
        <div ref="map" style="width: 100%; height: calc(100vh - 134px)"></div>
    </div>
</template>
<script>
    var H = window.H;
    var parser = new DOMParser();

    export default {
        name: 'HereMap',
        data(){
            return {
                map: null,
                platform: null,
                defaultLayers: null,
            }
        },
        props: {

        },
        created() {
            this.platform = new H.service.Platform({
                "app_id": "DVYP75y6iQZqvQMCyWNK",
                "app_code": "GlMLLoZS0P7GUhOAUxu3Sw"
            });
        },
        mounted() {
            this.defaultLayers = this.platform.createDefaultLayers();
            this.map = new H.Map(
                this.$refs.map,
               this.defaultLayers.terrain.map,
                {
                    zoom: 8,
                    center: {lat: 52.3122622, lng: 5.5479606}
                }
            );

            var events = new H.mapevents.MapEvents(this.map);
            var behavior = new H.mapevents.Behavior(events);



        }
    }
</script>
