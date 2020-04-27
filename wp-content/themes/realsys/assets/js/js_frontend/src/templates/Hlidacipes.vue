<template>
    <div class="hlidaciPes">
        <button class="btn" @click="openPopup" v-if="allowWatchdog">
            Nastavit hlídacího psa
        </button>

        <Servicebuy
                v-bind:is_user_logged="this.user_logged"
                v-bind:service="this.service"
                v-bind:payment_link="this.payment_link"
                v-bind:login_link="this.login_link"
                v-bind:ajax_url="this.ajax_url"
                v-bind:currency="this.currency"
                v-bind:assets_path="this.assets_path"
                ref="servicebuy"
                design="hidden"
        ></Servicebuy>
        <transition name="bounce">
            <div v-if="this.popupOn" class="hlidacipes-popup">
                <div class="hlidacipes-popup--inner">
                    <form ref="form" v-on:submit.prevent="submitWatchdog()" v-if="user_logged !== false && this.watchDogCreated == 0">
                        <h2>Nastavení hlídacího psa</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis rhoncus, felis in consequat rutrum, purus quam vehicula metus, a semper purus odio ut sem. Pellentesque a ipsum ante. Ut sit amet ornare est.</p>
                        <div>
                            <label>
                                Název hlídacího psa
                                <input type="text" v-model="formData.name" placeholder="Název hlídacího psa" required minlength="3">
                            </label>
                        </div>

                        <div>
                            <label>
                                Typ hlídacího psa
                                Denně(placené) <input type="radio" name="watchdog-type" value="1" v-model="formData.type">
                                Týdně <input type="radio" name="watchdog-type" value="0" v-model="formData.type">
                            </label>
                        </div>

                        <div class="button-controls">
                            <button type="submit">Uložit psa</button>
                            <button type="button" @click="closePopup">Zrušit</button>
                        </div>
                    </form>
                    <div v-else-if="user_logged == false && this.watchDogCreated == 0">
                        <h2>Přihlášení</h2>
                        <p>Bohužel nejste přihlášen. Pro přidání psa nejdříve pokračujte na přihlášení a potom proveďte vyhledávání a přidání hlídacího psa</p>
                        <a :href="home_url + '/login/'" class="btn">Přihlášení</a>
                    </div>
                    <div class="" v-else>
                        <h2>Vytvoření hlídacího psa</h2>
                        <p>Váš hlídací pes byl úspěšně vytvořen.</p>
                        <a :href="this.home_url + '/uzivatel/'+ this.user_logged + '/'" class="btn">Podívejte se na své hlídací psi</a>
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
        props: ['search_data', 'ajax_url', 'user_logged', 'home_url', 'login_link', 'payment_link', 'is_user_logged', 'service', 'currency', 'assets_path'],
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
                    alert("Nejdříve prosím nastavte filtr")
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
                return Object.entries(this.search_data).length > 0;
            }
        }
    }
</script>

<style scoped>
    .hlidacipes-popup{
        position: fixed;
        background-color: rgba(255,255,255,0.7);
        left: 0px;
        right: 0px;
        top: 0px;
        bottom: 0px;
        z-index: 99;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hlidacipes-popup--inner{
        min-width: 800px;
        max-width: 800px;
        padding: 30px;
        box-sizing: border-box;
        background-color: white;
        border-radius: 15px;
        box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.21);
    }

    .bounce-enter-active {
        animation: bounce-in .5s;
    }
    .bounce-leave-active {
        animation: bounce-in .5s reverse;
    }
    @keyframes bounce-in {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.5);
        }
        100% {
            transform: scale(1);
        }
    }

</style>