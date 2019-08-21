import Vue from 'vue';
import GoogleMap from './components/GoogleMap';
import MapControls from './components/MapControls';
import FormRenderer from "./components/FormRenderer";


Vue.component('GoogleMap', GoogleMap);
Vue.component('MapControls', MapControls);
Vue.component( 'FormRenderer', FormRenderer);


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
