import Vue from 'vue';
import Vypis from "./templates/Vypis.vue";
import Vyhledavanimapa from "./templates/Vyhledavanimapa.vue";
import Zobrazkontakt from "./templates/Zobrazkontakt.vue";
import Pridatinzerat from "./templates/Pridatinzerat.vue";
import Vuelidate from 'vuelidate';

Vue.use(Vuelidate);



var app = $(".app");
if(app.length > 0){
    var app = new Vue({
        el: ".app",
        data: {
            test: "tetss"
        },
        components :{
            Vypis, Vyhledavanimapa, Zobrazkontakt, Pridatinzerat
        },
        mounted() {

        },
    });

    window.app = app;
}

