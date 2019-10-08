import Inzeraty from "./templates/Inzeraty.vue"

var app = new Vue({
    el: ".app",
    data: {
        test: "tetss"
    },
    components :{
        Inzeraty
    }
});

window.app = app;