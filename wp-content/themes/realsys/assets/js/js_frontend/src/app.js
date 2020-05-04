import Vue from 'vue';
import Vypis from "./templates/Vypis.vue";
import Vyhledavanimapa from "./templates/Vyhledavanimapa.vue";
import Zobrazkontakt from "./templates/Zobrazkontakt.vue";



var app = $(".app");
if(app.length > 0){
    var app = new Vue({
        el: ".app",
        data: {
            test: "tetss"
        },
        components :{
            Vypis, Vyhledavanimapa, Zobrazkontakt
        },
        mounted() {

        },
    });

    window.app = app;
}

