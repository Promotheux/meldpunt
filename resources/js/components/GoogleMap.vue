<template>
    <div>
        <div id="map"></div>
    </div>
</template>

<style>
</style>

<script>
    import Vue from 'vue';

    import MarkerClusterer from '../utils/MarkerClusterer';

    let theNetherlands = [52.3122622, 5.5479606];
    let marker = "";

    export default {
        props: {
            'latitude': {
                type: Number,
                default(){
                    return EventBus.theNetherlands[0];
                }
            },
            'longitude': {
                type: Number,
                default(){
                    return EventBus.theNetherlands[1];
                }
            },
            'zoom': {
                type: Number,
                default(){
                    return 8;
                }
            }
        },
        mounted() {
            this.$markers = [];

            this.$map = new google.maps.Map(document.getElementById("map"), {
                disableDefaultUI: true,
                zoomControl: true,
                center: new google.maps.LatLng(this.latitude, this.longitude),
                zoom: this.zoom,
            });


            var map = this.$map;
            var markers = null;
            var markerCluster = null;
            var lastOpen = null;

            this.$map.data.loadGeoJson(
                '/data/eikenprocessierups',
                null,
                function(features){
                 markers = features.map(function (feature) {
                        var g = feature.getGeometry();
                        var marker = new google.maps.Marker({
                            'position': g.get(0)
                        });


                        var infowindow = new google.maps.InfoWindow({
                            content: feature.l.location + " - " + feature.l.community
                        });


                        marker.addListener('click', function(){
                            if(lastOpen != null) {
                                lastOpen.close();
                            }

                            infowindow.open(map, marker);
                            lastOpen = infowindow;
                        });


                        return marker;
                    });

                    markerCluster = new MarkerClusterer(map, markers);
                });

            this.$markers = markers;
            this.$markerCluster = markerCluster;

            this.$map.data.setStyle(function (feature) {
                return { icon: feature.getProperty('icon'), visible: false };
            });


        },
        created(){
            var me = this;
            EventBus.$on('add-marker', ()=> {
                this.listener = google.maps.event.addListener(this.$map, 'click', function(event){
                    me.placeMarker(event.latLng.lat(), event.latLng.lng());
                });
            });
            EventBus.$on('to-place', (data)=> {
                this.goToPlace(data.latitude, data.longitude, data.bounds);
            });

            EventBus.$on('reset-listener', ()=> {
                google.maps.event.clearListeners(this.$map, 'click');
                google.maps.event.clearListeners(this.listener);
            });

        },
        data(){
            return {
                map: this.$map,
                listener: "",
                markerCluster: null,
                layer: "",
            };
        },
        methods : {
            makeMarker(latitude, longitude){
               return new google.maps.Marker({
                   position: new google.maps.LatLng(latitude, longitude),
                   icon: null,
                   map: this.$map,
                   title: null
               });
            },

            clearMarkers(){
                for(let i=0; i < this.$markers.length; i++){
                    this.$markers[i].setMap(null);
                }
            },

            goToPlace(latitude, longitude, bounds){
                this.$map.setCenter(
                    new google.maps.LatLng(latitude, longitude)
                );
                this.$map.fitBounds(bounds);
            },

            placeMarker(latitude, longitude){
                console.log("Got it", latitude, longitude);
                let marker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    map: this.$map
                });

                this.$markers.push(marker);

                google.maps.event.clearListeners(this.$map, 'click');
                google.maps.event.clearListeners(this.listener);

                this.markerCluster.addMarkers(this.$markers);

                EventBus.$emit('update-button');
            }
        }
    }
</script>

<style scoped>
    #map {
        height: calc(100vh - 134px);
        width:100%;
        margin:0 auto;
        z-index:1;
        position:relative;
    }
</style>
