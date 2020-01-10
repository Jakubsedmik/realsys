import Vue from 'vue';
import Inzerat from "./templates/Inzerat.vue";
import Vyhledavani from "./templates/Vyhledavani.vue";
import VyhledavaniMapa from "./templates/VyhledavaniMapa.vue";


var app = $(".app");
if(app.length > 0){
    var app = new Vue({
        el: ".app",
        data: {
            test: "tetss"
        },
        components :{
            Inzerat, Vyhledavani, VyhledavaniMapa
        }
    });

    window.app = app;
}
