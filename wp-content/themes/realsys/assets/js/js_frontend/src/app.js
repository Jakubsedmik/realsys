import Vue from 'vue';
import Vypis from "./templates/Vypis.vue";
import Vyhledavanimapa from "./templates/Vyhledavanimapa.vue";
import Servicebuy from "./templates/Servicebuy.vue"



var app = $(".app");
if(app.length > 0){
    var app = new Vue({
        el: ".app",
        data: {
            test: "tetss"
        },
        components :{
            Vypis, Vyhledavanimapa, Servicebuy
        },
        mounted() {

        },
    });

    window.app = app;
}

Vue.directive('click-outside', {
    bind: function (el, binding, vnode) {
        el.clickOutsideEvent = function (event) {
            // here I check that click was outside the el and his childrens
            if (!(el == event.target || el.contains(event.target))) {
                // and if it did, call method provided in attribute value
                vnode.context[binding.expression](event);
            }
        };
        document.body.addEventListener('click', el.clickOutsideEvent)
    },
    unbind: function (el) {
        document.body.removeEventListener('click', el.clickOutsideEvent)
    },
});
