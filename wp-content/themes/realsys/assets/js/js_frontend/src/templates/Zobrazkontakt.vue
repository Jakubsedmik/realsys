<template>
    <div class="zobrazkontakt">
        <button @click="openPopup" class="btn btn-small">Chcem bývať</button>

        <Servicebuy
                v-bind:is_user_logged="this.user_logged"
                v-bind:service="this.service"
                v-bind:payment_link="this.payment_link"
                v-bind:login_link="this.login_link"
                v-bind:ajax_url="this.ajax_url"
                v-bind:currency="this.currency"
                v-bind:assets_path="this.assets_path"
                v-bind:entityid="this.inzerat_id"
                v-bind:entitytype="inzeratClass"
                ref="servicebuy"
                design="hidden"
        ></Servicebuy>

        <transition name="bounce">
            <div v-if="this.popupOn" class="service-popup">
                <div class="service-popup--inner">
                    <div v-if="user_logged !== false && this.contactAvailable == false">
                        <h2>Zobrazení kontaktu</h2>
                        <p>Zobrazení kontaktu stojí <strong>{{service.price}} kreditů</strong>. Pro zobrazení kontaktu klikněte na tlačítko zobrazit.</p>
                        <button class="btn btn-small" @click="payForContact">Zobrazit a zaplatit za kontakt</button>
                    </div>
                    <div v-else-if="user_logged == false && this.contactAvailable == false">
                        <h2>Přihlášení</h2>
                        <p>Bohužel nejste přihlášen. Pro zobrazení kontaktu musíte být nejprve přihlášen. Proveďte přihlášení následně vraťte zpět na inzerát a zobrazte si kontakt.</p>
                        <a :href="home_url + '/login/'" class="btn">Přihlášení</a>
                    </div>
                    <div class="" v-else>
                        <h2>Zobrazení kontaktu</h2>
                        <p>Váš kontakt na uživatele naleznete níže.</p>
                        <ul>
                            <li>Jméno: {{jmeno}}</li>
                            <li>Příjmení: {{prijmeni}}</li>
                            <li>Telefon: <a :href="'tel:' + this.telefon">{{telefon}}</a></li>
                            <li>Email: <a :href="'mailto:'+ this.email">{{email}}</a></li>
                        </ul>
                        <a :href="this.uzivatel_url" class="btn">Zobrazit profil uživatele</a>
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
            'user_logged', 'service', 'payment_link', 'login_link', 'ajax_url', 'currency', 'assets_path', 'home_url', 'inzerat_id'
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
                    console.log(postData);
                    _this.payForContact();
                }
            });
        },
    }
</script>

<style scoped>

</style>