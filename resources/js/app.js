import Vue from 'vue';
import GoogleMap from './components/GoogleMap';
import MapControls from './components/MapControls';
import MarkerForm from './components/MarkerForm';

Vue.component('GoogleMap', GoogleMap);
Vue.component('MapControls', MapControls);
Vue.component('MarkerForm', MarkerForm);

window.EventBus = new Vue({
    data(){
        return {
            theNetherlands: [52.3122622, 5.5479606]
        };
    }
});

new Vue({
    el:"#app"
});