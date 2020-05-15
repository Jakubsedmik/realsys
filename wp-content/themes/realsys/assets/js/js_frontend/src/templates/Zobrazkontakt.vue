<template>
    <div class="zobrazkontakt">
        <button @click="openPopup" class="btn btn-small">{{translations.chciBydlet}}</button>

        <Servicebuy
                v-bind:user_logged="this.user_logged"
                v-bind:service="this.service"
                v-bind:payment_link="this.payment_link"
                v-bind:login_link="this.login_link"
                v-bind:ajax_url="this.ajax_url"
                v-bind:currency="this.currency"
                v-bind:assets_path="this.assets_path"
                v-bind:entityid="this.inzerat_id"
                v-bind:entitytype="'inzeratClass'"
                v-bind:translations="this.translations"
                ref="servicebuy"
                design="hidden"
        ></Servicebuy>

        <transition name="bounce">
            <div v-if="this.popupOn" class="service-popup">

                <div class="kontk-maj-modal" tabindex="-1">
                    <div class="modal-dialog">

                        <div class="modal-content light-blue-bg rounded-b shadow-big text-center">

                            <div class="modal-header">
                                <button type="button" class="close" @click="closePopup">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body" v-if="user_logged !== false && this.contactAvailable == false">
                                <h2 class="sz-tit">{{translations.zobrazeniKontaktu}}</h2>
                                <img class="maj-img mb-sm-4 mb-3" :src="this.assets_path + '/avatar.png'" alt="">
                                <p class="mb-sm-5 mb-3">{{translations.zobrazeniKontaktuStoji}} <strong>{{service.price}} {{translations.kreditu}}</strong>. {{translations.proZobrazeniKontaktu}}</p>
                                <a class="btn mb-sm-5 mb-3" @click.prevent="payForContact">{{translations.zobrazitAZaplatitZaKontakt}}</a>
                            </div>

                            <div class="modal-body" v-else-if="user_logged == false && this.contactAvailable == false">
                                <h2 class="sz-tit">{{translations.prihlaseni}}</h2>
                                <img class="maj-img mb-sm-4 mb-3" :src="this.assets_path + '/avatar.png'" alt="">
                                <p class="mb-sm-5 mb-3">{{translations.bohutelNejstePrihlasenKontakt}}</p>
                                <a class="btn mb-sm-5 mb-3" :href="login_link">{{translations.prihlaseni}}</a>
                            </div>

                            <div class="modal-body" v-else>
                                <h2 class="sz-tit">{{translations.zobrazeniKontaktu}}</h2>
                                <img class="maj-img mb-sm-4 mb-3" :src="this.assets_path + '/avatar.png'" alt="">
                                <h3>{{translations.vasKontaktNaUzivatele}}</h3>
                                <h2 class="sz-tit mb-2">{{translations.jmeno}} {{jmeno}} {{prijmeni}}</h2>
                                <p class="mb-2">{{translations.email}} <a :href="'mailto:'+ this.email">{{email}}</a></p>
                                <p class="mb-sm-5 mb-3">{{translations.telefon}} <a :href="'tel:' + this.telefon">{{telefon}}</a></p>
                                <a :href="this.uzivatel_url" class="btn">{{translations.zobrazitProfilUzivatele}}</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    import Servicebuy from "./Servicebuy.vue";
    import Axios from "axios";
    import VueAxios from 'vue-axios';


    export default {
        name: "Zobrazkontakt",
        components: {
            Servicebuy
        },
        data: function(){
            return {
                contactAvailable: false,
                popupOn: false,
                transactionId: false,
                jmeno: false,
                prijmeni: false,
                telefon: false,
                email: false,
                uzivatel_url: false
            }
        },
        props: [
            'user_logged', 'service', 'payment_link', 'login_link', 'ajax_url', 'currency', 'assets_path', 'home_url', 'inzerat_id', 'translations'
        ],

        methods: {
            openPopup(){
                this.popupOn = 1;
            },
            closePopup(){
                this.popupOn = 0;
            },
            payForContact(){
                var _this = this;
                if(this.transactionId == false){
                    this.$refs['servicebuy'].checkCredits();
                }else{


                    var bodyFormData = new FormData();
                    bodyFormData.append("action", "payForContact");
                    bodyFormData.append("transactionid", this.transactionId);
                    bodyFormData.append("entityid", this.inzerat_id);

                    Axios.post(this.ajax_url, bodyFormData).then(function (response) {
                        if(response && response.data.hasOwnProperty("status") && response.data.status == 1){

                            _this.jmeno = response.data.jmeno;
                            _this.prijmeni = response.data.prijmeni;
                            _this.telefon = response.data.telefon;
                            _this.email = response.data.email;
                            _this.uzivatel_url = response.data.uzivatel_url;

                            _this.contactAvailable = true;
                        }else{
                            alert("Došlo k chybě v systému: " + response.data.message);
                        }
                    }).catch(function (e) {
                        console.error(e);
                    });
                }
            }
        },
        mounted() {
            var _this = this;
            this.$root.$on('paymentCompleted',function (postData) {
                if(postData.hasOwnProperty("transactionid")){
                    _this.transactionId = postData.transactionid;
                    _this.payForContact();
                }
            });
        },
    }
</script>

<style scoped>

</style>