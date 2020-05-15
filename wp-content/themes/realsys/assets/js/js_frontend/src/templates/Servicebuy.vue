<template>
    <div :class="{serviceBuy: true, serviceLoading: this.loading}">
        <div class="userLogged" v-if="this.user_logged">
            <div class="serviceControls" v-if="design=='interactive'">
                <h2>{{service.name}} - {{service.price}} {{currency}}</h2>
                <button v-on:click="checkCredits()" class="btn">{{translations.koupitSluzbu}}</button>
            </div>
            <transition name="bounce">
                <div class="service-popup" v-if="this.openServiceBuyPopup && !this.loading">

                    <div class="kontk-maj-kredit-modal" v-click-outside="closePopup">
                        <div class="modal-dialog">
                            <div class="modal-content light-blue-bg rounded-b shadow-big text-center">
                                <div class="modal-header">
                                    <button type="button" class="close" @click="closePopup">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <h2 class="sz-tit">{{translations.mateDostatekKreditu}}</h2>
                                    <p class="mb-4">{{translations.muzetePokracovatVNakupuSluzby}}</p>

                                    <div class="serviceSpecs">
                                        <h3>{{service.name}}</h3>
                                        <p>{{translations.cena}} {{service.price}} {{service.currency}}</p>
                                    </div>

                                    <button class="btn mb-sm-5 mb-3" v-on:click="proceedBuy()">{{translations.nakoupitSluzbu}}</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="service-popup" v-if="this.openCreditsBuyPopup && !this.loading">

                    <div class="kontk-maj-kredit-modal" v-click-outside="closePopup">
                        <div class="modal-dialog">
                            <div class="modal-content light-blue-bg rounded-b shadow-big text-center">
                                <div class="modal-header">
                                    <button type="button" class="close" @click="closePopup">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <h2 class="sz-tit">{{translations.nemateDostatekKreditu}}</h2>
                                    <p class="mb-4">{{creditStatus}}</p>
                                    <p>{{translations.nejdrivePokracujteNakupemKreditu}}</p>

                                    <a :href="this.payment_link + '?serviceOrder=' + this.service.id" class="btn">{{translations.nakoupitKredity}}</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="service-popup" v-if="this.openFinishPopup && !this.loading">

                    <div class="kontk-maj-kredit-modal" v-click-outside="closePopup">
                        <div class="modal-dialog">
                            <div class="modal-content light-blue-bg rounded-b shadow-big text-center">
                                <div class="modal-header">
                                    <button type="button" class="close" @click="closePopup">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <h2 class="sz-tit">{{translations.sluzbaBylaZaplacena}}</h2>
                                    <p class="mb-4">{{translations.dekujeme}}</p>
                                    <button class="btn" v-on:click="closePopup">{{translations.zavrit}}</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="service-popup" v-if="this.openErrorPopup && !this.loading">

                    <div class="kontk-maj-kredit-modal" v-click-outside="closePopup">
                        <div class="modal-dialog">
                            <div class="modal-content light-blue-bg rounded-b shadow-big text-center">
                                <div class="modal-header">
                                    <button type="button" class="close" @click="closePopup">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <h2 class="sz-tit">{{errorHeading}}</h2>
                                    <p class="mb-4">{{errorMessage}}</p>
                                    <button class="btn" v-on:click="closePopup">{{translations.zavrit}}</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="service-popup" v-if="this.loading">

                    <div class="kontk-maj-kredit-modal" v-click-outside="closePopup">
                        <div class="modal-dialog">
                            <div class="modal-content light-blue-bg rounded-b shadow-big text-center">
                                <div class="modal-header">
                                    <button type="button" class="close" @click="closePopup">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <h2 class="sz-tit">{{loadingMessage}}</h2>
                                    <img :src="this.assets_path + 'loading.gif'">
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </transition>
        </div>

        <div class="topInzeratWrapper" v-if="design=='inzeratTop'">
            <button v-on:click="checkCredits()" class="btn ico-btn" v-if="already_bought==0">
                <i class="fas fa-star"></i>
                {{translations.topovat}}
            </button>
            <div v-else>
                {{translations.inzeratJeJizTopovany}}
                <div class="topInzerat">{{translations.top}}</div>
            </div>
        </div>

        <div v-if="design !== 'hidden' && user_logged==0" class="userNotLogged">
            <h2>{{translations.nejstePrihlasen}}</h2>
            <p>{{translations.proNakupTetoSluzbyMusiteBytPrihlasen}}</p>
            <a :href="this.login_link" class="btn">{{translations.prihlasitSe}}</a>
        </div>
    </div>
</template>

<script>

    import Axios from "axios";
    import VueAxios from 'vue-axios';
    import vClickOutside from 'v-click-outside'



    export default {
        directives: {
            clickOutside: vClickOutside.directive
        },
        name: "Servicebuy",
        props: {
            'user_logged' :{
                default: false,
                type: [Number, Boolean]
            },
            'login_link' : {
                default: "/realsys/login/",
                type: String
            },
            'payment_link' : {
                default: "/realsys/objednavka/",
                type: String
            },
            'service' : {
                default: function(){
                    return {
                        id: 1,
                        name: 'Topování inzerátu.',
                        logName: 'Top inzerátu ID: %d',
                        price: 1,
                        requireEntity: true,
                        handlingFunction: "handleTopInzerat"
                    }
                },
                type: Object
            },
            'currency' : {
                default: 'CZK',
                type: String
            },
            'ajax_url' : {
                default: '/realsys/wp-admin/admin-ajax.php',
                type: String
            },
            'assets_path' : {
                default: '/realsys/wp-content/themes/realsys/assets/',
                type: String
            },
            'entityid': {
                default: 1,
                type: Number,
                required: false
            },
            'entitytype' : {
                default: 'inzeratClass',
                type: String,
                required: false
            },
            'design' : {
                default: 'interactive',
                type: String
            },
            'already_bought' : {
                default: 0,
                type: Number,
                required: false
            },
            "translations" : {
                type: Object,
                required: true
            }
        },
        data: function () {
            return {
                openServiceBuyPopup: false,
                openCreditsBuyPopup: false,
                openFinishPopup: false,
                openErrorPopup: false,
                loading: false,
                proceedAvailable: false,
                loadingMessage: "Načítání",
                creditStatus: "Nedostatek kreditů",
                errorHeading: "",
                errorMessage: ""
            }
        },
        mounted() {

            this.loadingMessage = this.translations.nacitani;
            this.creditStatus = this.translations.nedostatekKreditu;

            this.$root.$on("closeServicebuy", function () {
                this.closePopup();
            });
        },
        methods: {
            checkCredits: function () {
                if(this.user_logged != 0){

                    var request = this.ajax_url + "?action=checkUserCredits&serviceid=" + this.service.id;
                    this.loading = true;
                    this.loadingMessage = this.translations.probihaOverovaniStavuKreditu;
                    var _this = this;
                    setTimeout(function () {
                        // 1. check množství kreditů
                        Axios.get(request).then(function (response) {
                            if(typeof response.data == "object"){
                                _this.loading = false;
                                if(response.data.status == 1){
                                    // 2. pokud ok zobrazím platební stránku
                                    _this.openServiceBuyPopup = true;
                                    _this.openCreditsBuyPopup = false;
                                    _this.proceedAvailable = true;
                                }else{
                                    // 3. pokud ne ok zobrazím link na dobití
                                    _this.creditStatus = response.data.message;
                                    _this.openServiceBuyPopup = false;
                                    _this.openCreditsBuyPopup = true;
                                    _this.proceedAvailable = false;
                                }
                            }
                        }).catch(function (error) {
                            _this.loading = false;
                            console.error(error);
                        });
                    }, 1000);

                }else{
                    window.location.href = this.login_link;
                }
            },
            proceedBuy: function(){
                var _this = this;

                if(this.proceedAvailable){
                    this.loading = true;
                    this.loadingMessage = this.translations.probihaPlatbaZaSluzbu;
                    this.openCreditsBuyPopup = false;
                    this.openServiceBuyPopup = false;

                    var request = this.ajax_url + "?action=payForService&serviceid=" + this.service.id;

                    if(this.service.requireEntity == 1){
                        if(typeof this.entityid == "number" && this.entitytype){
                            request += "&entitytype=" + this.entitytype + "&entityid=" + this.entityid;
                        }else{
                            alert("Nastala chyba v konfiguraci! Prosím kontaktujte administrátora.");
                            this.closePopup();
                        }
                    }

                    setTimeout(function () {
                        Axios.get(request).then(function (response) {
                            _this.loading = false;
                            if(response.data.status > 0){

                                if(response.data.hasOwnProperty("behavior")){
                                    var behavior = response.data.behavior.split(",");
                                    _this.already_bought = 1;

                                    if(behavior.includes("close")){
                                        _this.closePopup()
                                    }

                                    if(behavior.includes("finish")){
                                        _this.openFinishPopup = true;
                                    }

                                    if(behavior.includes("announce")){
                                        _this.$root.$emit("paymentCompleted", response.data);
                                    }
                                }else{
                                    _this.openFinishPopup = true;
                                }

                            }else{
                                _this.showError("Došlo k chybám",response.data.message);
                            }
                        }).catch(function (error) {
                            console.error(error);
                        });
                    }, 1000);

                }else{
                    this.showError("Chyba", "Pokoušíte se o něco nesprávného");
                }
            },
            closePopup: function (event) {
                var _this = this;
                _this.loading = false;
                _this.loadingMessage = this.translations.nacitani;

                if(_this.openServiceBuyPopup){
                    _this.openServiceBuyPopup = false;
                }

                if(_this.openCreditsBuyPopup){
                    _this.openCreditsBuyPopup = false;
                }

                if(_this.openFinishPopup){
                    _this.openFinishPopup = false;
                }

                if(_this.openErrorPopup){
                    _this.openErrorPopup = false;
                }
            },
            showError: function(errorHeading, errorMessage){
                this.closePopup();
                this.openErrorPopup = true;
                this.proceedAvailable = false;
                this.errorHeading = errorHeading;
                this.errorMessage = errorMessage;
            }

        }
    }
</script>

<style scoped>

    .service-popup{
        z-index: 10000;
    }

    .bounce-enter-active {
        animation: wiggle .5s;
    }
    .bounce-leave-active {
        animation: wiggle .5s reverse;
    }

    .topInzerat{
        position: absolute;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        height: 30px;
        width: 30px;
        background-color: #FF970B;
        border-radius: 50%;
        color: white;
        text-align: center;
        line-height: 30px;
        text-transform: uppercase;
        font-size: 10px;
    }

</style>