<template>
    <div class="zobrazkontakt">
        <button @click="openPopup" class="btn btn-small js-transfer-to-click">{{translations.chciBydlet}}</button>

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
                    <div class="modal-dialog" :class="{isLoading: this.isLoading}">

                        <div class="modal-content light-blue-bg rounded-b shadow-big text-center">

                            <div class="modal-header">
                                <button type="button" class="close" @click="closePopup">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body" v-if="user_logged !== false && this.contactAvailable == false">
                                <h2 class="sz-tit">{{translations.zobrazeniKontaktu}}</h2>

                                <img class="maj-img mb-sm-4 mb-3" v-if="user_avatar" :src="user_avatar" alt="">
                                <h2 class="sz-tit" v-if="user_name">{{user_name}}</h2>

                                <p class="mb-sm-4 mb-3">{{translations.zobrazeniKontaktuStoji}} <strong>{{service.price}} {{translations.kreditu}}</strong>. {{translations.proZobrazeniKontaktu}}</p>
                                <a class="btn mb-sm-3 mb-3" @click.prevent="payForContact">{{translations.zobrazitAZaplatitZaKontakt}}</a>
                            </div>

                            <div class="modal-body" v-else-if="user_logged == false && this.contactAvailable == false">
                                <h2 class="sz-tit">{{translations.zobrazeniKontaktu}}</h2>

                                <img class="maj-img mb-sm-4 mb-3" v-if="user_avatar" :src="user_avatar" alt="">
                                <h2 class="sz-tit" v-if="user_name">{{user_name}}</h2>

                                <p class="mb-sm-4 mb-3">{{translations.zobrazeniKontaktuStoji}} <strong>{{service.price}} {{translations.kreditu}}</strong>.</p>

                                <p class="mb-sm-4 mb-3">{{translations.bohuzelNejstePrihlasenKontakt}}</p>


                                <a class="btn mb-sm-3 mb-3" :href="login_link">{{translations.prihlaseni}}</a>
                                <a class="btn mb-sm-3 mb-3" @click.prevent="goBuyAnonymous" href="" v-if="!buyAnonymous">{{translations.zaplatitZaKontaktBezPrihlaseni}}</a>
                                <p class="announcement" v-if="this.shouldLogin">Zjistili jsme že email který jste zadal patří již řádně registrovanému uživateli. Nejdříve se prosím tedy zalogujte.</p>

                                <form :action="quickOrderLink()" method="post" v-if="this.buyAnonymous" ref="anonymousRegForm">
                                    <h3>Kontakt bez přihlášení</h3>
                                    <p>Aby jste mohli zakoupit kontakt bez přihlášení je nutné vyplnit následující údaje.</p>
                                    <label class="form-field" :class="errorClass('db_email')">
                                        <input type="email" name="db_email" class="input-outline" placeholder="Váš email" v-model.trim="$v.modelData.db_email.$model" @keyup="">
                                        <div class="error" v-if="errorAppear('db_email')">Toto pole je povinné</div>
                                        <div class="error" v-if="errorAppear('db_email', 'email')">Toto pole není tvaru email.</div>
                                    </label>

                                    <div class="second-form-part" v-if="doesRequireName">
                                        <p class="announcement">Tuto emailovou adresu jsme v našem systému nenalezli, proto prosím uveďte ještě Vaše jméno a příjmení</p>
                                        <label class="form-field" :class="errorClass('db_jmeno')">
                                            <input type="text" name="db_jmeno" class="input-outline" placeholder="Vaše jméno" v-model.trim="$v.modelData.db_jmeno.$model">
                                            <div class="error" v-if="errorAppear('db_jmeno')">Toto pole je povinné</div>
                                        </label>
                                        <label class="form-field" :class="errorClass('db_prijmeni')">
                                            <input type="text" name="db_prijmeni" class="input-outline" placeholder="Vaše příjmení" v-model.trim="$v.modelData.db_prijmeni.$model">
                                            <div class="error" v-if="errorAppear('db_prijmeni')">Toto pole je povinné</div>
                                        </label>
                                    </div>

                                    <button type="button" class="btn" @click="proceedAnonymousOrder()">Zaplatit</button>
                                </form>
                            </div>

                            <div class="modal-body" v-else>
                                <h2 class="sz-tit">{{translations.zobrazeniKontaktu}}</h2>
                                <img class="maj-img mb-sm-4 mb-3" v-if="user_avatar" :src="user_avatar" alt="">
                                <p>{{translations.vasKontaktNaUzivatele}}</p>
                                <h2 class="sz-tit mb-2">{{translations.jmeno}} {{jmeno}} {{prijmeni}}</h2>
                                <p class="mb-2">{{translations.email}} <a :href="'mailto:'+ this.email">{{email}}</a></p>
                                <p class="mb-sm-4 mb-3">{{translations.telefon}} <a :href="'tel:' + this.telefon">{{telefon}}</a></p>
                                <a :href="this.uzivatel_url" class="btn mb-sm-3 mb-3">{{translations.zobrazitProfilUzivatele}}</a>
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
    import {required, minLength, between, requiredIf, email} from 'vuelidate/lib/validators'


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
                uzivatel_url: false,
                modelData: {
                    db_jmeno: "",
                    db_prijmeni: "",
                    db_email: ""
                },
                buyAnonymous: false,
                doesRequireName: false,
                isLoading: false,
                shouldLogin: false
            }
        },
        props: [
            'user_logged', 'service', 'payment_link', 'login_link', 'ajax_url', 'currency', 'assets_path', 'home_url', 'inzerat_id', 'translations', 'quick_payment_link', 'transaction_id', 'user_avatar', 'user_name'
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
            },
            quickOrderLink(){
                return this.quick_payment_link + '&serviceid=' + this.service.id + '&redirect=' + encodeURI(window.location.href);
            },
            goBuyAnonymous(){
                this.buyAnonymous = true;
                this.shouldLogin = false;
                this.doesRequireName = false;
                this.modelData.db_jmeno = "";
                this.modelData.db_prijmeni = "";
                this.modelData.db_email = "";

            },
            backToLogin(){
              this.shouldLogin = true;
              this.doesRequireName = false;
              this.buyAnonymous = false;
            },
            proceedAnonymousOrder(){
                var _this = this;
                this.$v.modelData.$touch();
                if (!this.$v.modelData.$invalid) {

                    if(this.modelData.db_prijmeni.length == 0 && this.modelData.db_jmeno == 0){
                        var endpoint = this.ajax_url + "?action=checkUserExistsAdvanced&db_email=" + this.modelData.db_email;
                        this.isLoading = true;
                        Axios.get(endpoint).then(function (response) {

                            if(response && response.data.hasOwnProperty("status")){
                                switch (response.data.status) {
                                    case 0: _this.doesRequireName = true; break;
                                    case -1: alert("Systémová chyba:" . response.data.message); break;
                                    case 1: _this.$refs['anonymousRegForm'].submit(); break;
                                    case 2: _this.backToLogin(); break;
                                    default: alert("Došlo k systémové chybě, kontaktujte administrátora");
                                }
                                _this.$v.modelData.$reset();
                            }else{
                                alert("Došlo k systémové chybě, kontaktujte administrátora");
                            }
                            _this.isLoading = false;
                        }).catch(function (e) {
                            console.log(e);
                        });
                    }else{
                        this.$refs['anonymousRegForm'].submit();
                    }
                }
            },

            errorClass: function (fieldName) {
                return {'form-field--error': this.$v.modelData[fieldName].$error};
            },
            errorAppear: function (fieldName, type = false) {
                if(type!==false){
                    return !this.$v.modelData[fieldName][type];
                }

                return !this.$v.modelData[fieldName].required;
            },
        },
        mounted() {
            var _this = this;
            this.$root.$on('paymentCompleted',function (postData) {
                if(postData.hasOwnProperty("transactionid") && _this.popupOn){
                    _this.transactionId = postData.transactionid;
                    _this.payForContact();
                }
            });

            if(this.transaction_id > -1){
                _this.openPopup();
                this.transactionId = this.transaction_id;
                _this.payForContact();
            }
        },
        validations: {
            modelData: {
                db_email: {
                    required,
                    email
                },
                db_jmeno: {
                    required: requiredIf(function () {
                        return this.doesRequireName;
                    })
                },
                db_prijmeni: {
                    required: requiredIf(function () {
                        return this.doesRequireName;
                    })
                }
            }
        }

    }
</script>

<style scoped lang="less">
    @website: "/";

    .error {
        display: none;
    }

    .form-field--error .error {
        display: block;
    }

    .isLoading:before{
        content: '';
        background-image: url("@{website}wp-content/themes/realsys/assets/images/images_backend/loading.gif");
        position: absolute;
        top: 0;
        left: 0px;
        right: 0px;
        bottom: 0px;
        background-color: rgba(255,255,255,0.5);
        background-position: center 200px;
        background-size: unset;
        background-repeat: no-repeat;
        z-index: 99;
    }

    .modal-dialog{
        position: relative;
    }

    .zobrazkontakt .modal-dialog .announcement{
        padding: 10px;
        border: 1px dashed white;
        background-color: #ff7c00;
        font-size: 14px;
        color: white;
        margin: 10px auto;
    }

</style>