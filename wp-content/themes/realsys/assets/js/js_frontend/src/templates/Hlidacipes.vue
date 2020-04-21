<template>
    <div class="hlidaciPes">
        <button class="btn" @click="openPopup" v-if="allowWatchdog">
            Nastavit hlídacího psa
        </button>

        <div v-if="this.popupOn" class="hlidacipes-popup">
            <div class="hlidacipes-popup--inner">
                <form ref="form" @submit="submitWatchdog($event)" v-if="userLogged !== false && this.watchDogCreated == 0">
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
                <div v-else-if="userLogged == false && this.watchDogCreated == 0">
                    <h2>Přihlášení</h2>
                    <p>Bohužel nejste přihlášen. Pro přidání psa nejdříve pokračujte na přihlášení a potom proveďte vyhledávání a přidání hlídacího psa</p>
                    <a :href="home_url + '/login/'" class="btn">Přihlášení</a>
                </div>
                <div class="" v-else>
                    <h2>Vytvoření hlídacího psa</h2>
                    <p>Váš hlídací pes byl úspěšně vytvořen.</p>
                    <a :href="this.home_url + '/uzivatel/'+ this.userLogged + '/'" class="btn">Podívejte se na své hlídací psi</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Axios from "axios";
    import VueAxios from 'vue-axios';

    export default {
        name: "Hlidacipes",
        props: ['searchData', 'apiurl', 'userLogged', 'home_url'],
        data: function () {
            return {
                popupOn: 0,
                watchDogCreated: 0,
                formData: {
                    type : 1,
                    name: ""
                }
            }
        },
        mounted() {
            console.log(this.searchData);
        },
        methods: {
            openPopup(){
                if(Object.entries(this.searchData).length > 0){
                    this.popupOn = 1;
                }else{
                    alert("Nejdříve prosím nastavte filtr")
                }
            },
            closePopup(){
                this.popupOn = 0;
            },
            submitWatchdog(event){
                var _this = this;
                event.preventDefault();
                var verify = this.$refs['form'].reportValidity();
                if(verify){
                    var postData = this.formData;
                    postData.filters = this.searchData;
                    var apiurl = this.apiurl.split("=")[0] + "=createWatchdog";
                    Axios.post(apiurl, postData).then(function (response) {
                        if (response)
                            if(typeof response.data == "object"){
                                if(response.data.status == 1){
                                    alert(response.data.message);
                                    _this.watchDogCreated = 1;
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
                return Object.entries(this.searchData).length > 0;
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
        z-index: 9999;
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

</style>