import Vue from 'vue';
import Vypis from "./templates/Vypis.vue";



var app = $(".app");
if(app.length > 0){
    var app = new Vue({
        el: ".app",
        data: {
            test: "tetss"
        },
        components :{
            Vypis
        },
        mounted() {

        },
    });

    window.app = app;
}
