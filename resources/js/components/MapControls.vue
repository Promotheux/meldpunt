<template>
    <div class="map-controls">
         <span class="searchbox">
             <input id="pac-input" type="text" name="place" />
            <i class="material-icons">search</i>
         </span>
         <span class="add-marker">
             <button class="btn waves-light" @click="addMarker"><i class="material-icons">{{ icon }}</i><span class="inner"> {{ btnText }} </span></button>
        </span>
        <form-renderer style="display:none" v-bind:formsource="formsource"></form-renderer>
    </div>
</template>

<style>
</style>

<script>
  import FormRenderer from "./FormRenderer";

    export default {
        data(){
            return {
                latitude: EventBus.theNetherlands[0],
                longitude: EventBus.theNetherlands[1],
                addingMarker: false,
                icon: "add",
                btnText: "Voeg uw locatie toe",
            };
        },
        props: {
            'formsource': {
                type:String,
                default() {
                  return null;
                }
            }
        },
        components: {
            FormRenderer
        },
        mounted(){
            var input = document.getElementById('pac-input');
            var autocomplete = new google.maps.places.Autocomplete(input);
            var me = this;

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                me.goToPlace(place);
            });
        },
        created(){
            EventBus.$on('update-button', () => {
                this.addingMarker = false;
                this.icon = "add";
                this.btnText = "Voeg uw locatie toe";
            });
        },
        methods: {
            addMarker(){
                if(!this.addingMarker){
                    this.icon = "close";
                    this.btnText = "Annuleer";
                    EventBus.$emit('add-marker');
                } else {
                    this.icon = "add";
                    this.btnText = "Voeg uw locatie toe";
                    EventBus.$emit('reset-listener');
                }

                this.addingMarker = !this.addingMarker;
            },


            goToPlace(place){
                EventBus.$emit('to-place', {
                    latitude: place.geometry.location.lat(),
                    longitude: place.geometry.location.lng(),
                    bounds: place.geometry.viewport,
                });
            }
        }
    }
</script>

<style>
    .map-controls {
        z-index:2;
    }
</style>
