<template>
    <div class="hlidaciPes">
        <button class="btn" @click="openPopup" v-if="allowWatchdog">
            {{translations.nastavitHlidacihoPsa}}
        </button>

        <Servicebuy
                v-bind:user_logged="this.user_logged"
                v-bind:service="this.service"
                v-bind:payment_link="this.payment_link"
                v-bind:login_link="this.login_link"
                v-bind:ajax_url="this.ajax_url"
                v-bind:currency="this.currency"
                v-bind:assets_path="this.assets_path"
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

                            <div class="modal-body" v-if="user_logged !== false && this.watchDogCreated == 0">
                                <form ref="form" v-on:submit.prevent="submitWatchdog()" v-if="user_logged !== false && this.watchDogCreated == 0">

                                    <h2 class="sz-tit">{{translations.nastaveniHlidacihoPsa}}</h2>
                                    <img class="maj-img mb-sm-4 mb-3" :src="this.assets_path + '/avatar.png'" alt="">
                                    <p class="mb-sm-5 mb-3">{{translations.nastaveniHlidacihoPsaText}}</p>
                                    <div>
                                        <label>
                                            {{translations.nazevHlidacihoPsa}}
                                            <input type="text" v-model="formData.name" :placeholder="translations.nazevHlidacihoPsa" required minlength="3">
                                        </label>
                                    </div>

                                    <h4>{{translations.typHlidacihoPsa}}</h4>
                                    <div>
                                        <label>{{translations.denne}} <input type="radio" name="watchdog-type" value="1" v-model="formData.type"></label>
                                        <label>{{translations.tydne}} <input type="radio" name="watchdog-type" value="0" v-model="formData.type"></label>
                                    </div>

                                    <div class="button-controls">
                                        <button type="submit" class="btn mb-sm-5 mb-3">{{translations.ulozitPsa}}</button>
                                        <button type="button" @click="closePopup" class="btn mb-sm-5 mb-3">{{translations.zrusit}}</button>
                                    </div>

                                </form>
                            </div>

                            <div class="modal-body" v-else-if="user_logged == false && this.watchDogCreated == 0">
                                <h2 class="sz-tit">{{translations.prihlaseni}}</h2>
                                <p class="mb-sm-5 mb-3">{{translations.bohuzelNejstePrihlasenPes}}</p>
                                <a :href="home_url + '/login/'" class="btn mb-sm-5 mb-3">{{translations.prihlaseni}}</a>
                            </div>

                            <div class="modal-body" v-else>
                                <h2 class="sz-tit">{{translations.vytvoreniHlidacihoPsa}}</h2>
                                <p class="mb-sm-5 mb-3">{{translations.vasHlidaciPesBylUspesneNastaven}}</p>
                                <a :href="this.home_url + '/uzivatel/'+ this.user_logged + '/'" class="btn mb-sm-5 mb-3">{{translations.podivejteSeNaSveHlidaciPsi}}</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    import Axios from "axios";
    import VueAxios from 'vue-axios';
    import Servicebuy from "./Servicebuy.vue";

    export default {
        name: "Hlidacipes",
        props: ['search_data', 'ajax_url', 'user_logged', 'home_url', 'login_link', 'payment_link', 'service', 'currency', 'assets_path',"translations"],
        components: { Servicebuy },
        data: function () {
            return {
                popupOn: 0,
                watchDogCreated: 0,
                formData: {
                    type : 1,
                    name: "",
                    transactionId: false
                },

            }
        },
        mounted() {
            var _this = this;
            this.$root.$on('paymentCompleted',function (postData) {
                if(postData.hasOwnProperty("transactionid")){
                    _this.formData.transactionId = postData.transactionid;
                    _this.submitWatchdog();

                }
            });
        },
        methods: {
            openPopup(){
                if(Object.entries(this.search_data).length > 0){
                    this.popupOn = 1;
                }else{
                    alert(this.translations.nejdriveProsimNastavteFiltr);
                }
            },
            closePopup(){
                this.popupOn = 0;
            },
            submitWatchdog(){
                var _this = this;

                var verify = this.$refs['form'].reportValidity();
                if(verify){
                    if(this.formData.type == 1 && this.formData.transactionId==false){
                        this.$refs['servicebuy'].checkCredits();
                        return false;
                    }
                    var postData = this.formData;
                    postData.filters = this.search_data;
                    var apiurl = this.ajax_url + "?action=createWatchdog";
                    Axios.post(apiurl, postData).then(function (response) {
                        if (response)
                            if(typeof response.data == "object"){
                                if(response.data.status == 1){
                                    _this.watchDogCreated = 1;
                                    _this.continueCreation = false;
                                }else{
                                    alert(response.data.message);
                                }
                            }else{
                                console.error("Data is not type of Object");
                            }
                    }).catch(function (error) {
                        console.error(error);
                    });
                }
            }
        },
        computed :{
            allowWatchdog: function () {
                for(let index in this.search_data){
                    let item = this.search_data[index];
                    if(item.value != -1){
                        return true;
                    }
                }
                return false;
            }
        }
    }
</script>

<style scoped>

</style>