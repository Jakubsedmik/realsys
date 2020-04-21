<template>
    <div :class="{serviceBuy: true, serviceLoading: this.loading}">
        <div class="userLogged" v-if="this.is_user_logged">
            <h2>{{service.name}} - {{service.price}} {{currency}}</h2>
            <button v-on:click="proceedBuy()" class="btn">Koupit službu</button>
            <transition name="bounce">
                <div class="serviceBuyPopup servicePopup" v-if="this.openServiceBuyPopup && !this.loading">
                    <div class="innerPopup" v-click-outside="closePopup()">
                        <h2>Máte dostatek kreditů</h2>
                        <p>Můžete pokračovat v nákupu služby</p>
                    </div>
                </div>
                <div class="creditsBuyPopup servicePopup" v-if="this.openCreditsBuyPopup && !this.loading" >
                    <div class="innerPopup" v-click-outside="closePopup()">
                        <h2>Nemáte dostatek kreditů</h2>
                        <p>Nejdříve pokračujte nákupem kreditů</p>

                        <a :href="this.payment_link" class="btn">Nakoupit kredity</a>
                    </div>
                </div>
                <div class="loadingPopup servicePopup" v-if="this.loading">
                    <div class="innerPopup">
                        <h2>Probíhá ověřování stavu kreditů</h2>
                        <img :src="this.assets_path + 'images/images_frontend/loading.gif'">
                    </div>
                </div>
            </transition>
        </div>
        <div v-else class="userNotLogged">
            <h2>Nejste přihlášen</h2>
            <p>Pro nákup této služby musíte být nejdříve přihlášen</p>
            <a :href="this.login_link" class="btn">Přihlásit se</a>
        </div>
    </div>
</template>

<script>

    import Axios from "axios";
    import VueAxios from 'vue-axios';


    export default {
        name: "Servicebuy",
        props: {
            'is_user_logged' :{
                default: false,
                type: Boolean
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
                        id: 2,
                        name: 'Testovací služba',
                        price: 20
                    }
                },
                type: Object
            },
            'currency' : {
                default: 'CZK',
                type: String
            },
            'api_url' : {
                default: '/realsys/wp-admin/admin-ajax.php',
                type: String
            },
            'assets_path' : {
                default: '/realsys/wp-content/themes/realsys/assets/',
                type: String
            }
        },
        data: function () {
            return {
                openServiceBuyPopup: false,
                openCreditsBuyPopup: false,
                loading: false
            }
        },
        methods: {
            proceedBuy: function () {
                if(this.is_user_logged){

                    var request = this.api_url + "?action=checkUserCredits&serviceid=" + this.service.id;
                    this.loading = true;
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
                                }else{
                                    // 3. pokud ne ok zobrazím link na dobití
                                    _this.openServiceBuyPopup = false;
                                    _this.openCreditsBuyPopup = true;
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
            closePopup: function (event) {
                var _this = this;

                if(_this.openServiceBuyPopup){
                    _this.openServiceBuyPopup = false;
                }

                if(_this.openCreditsBuyPopup){
                    _this.openCreditsBuyPopup = false;
                }

            }

        }
    }
</script>

<style scoped>
    .servicePopup{
        position: fixed;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        background-color: rgba(255,255,255,0.8);
        z-index: 999;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .servicePopup.loading{

    }

    .servicePopup .innerPopup{
        min-height: 300px;
        min-width: 900px;
        text-align: center;
        background-color: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.13);
    }

    .bounce-enter-active {
        animation: wiggle .5s;
    }
    .bounce-leave-active {
        animation: wiggle .5s reverse;
    }

</style>