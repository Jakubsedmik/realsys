<template>
    <div>
        <Vyhledavani></Vyhledavani>
        <section>
            <div class="top-nemovitosti">
                <div class="wrapper">

                    <Filtr v-bind:inzeratyCount="this.appData.totalRecordsCount">
                    </Filtr>

                    <div class="row">

                        <Inzerat
                                v-for="(inzerat, index) in appData.inzeraty"
                                v-bind:key="index"
                                v-bind:inzeratData="inzerat"
                                v-bind:currency="appData.currency"
                                v-bind:assetsPath="assetspath">
                        </Inzerat>

                    </div>

                    <Paging></Paging>

                    <div class="show-on-map">
                        <h3>Použijte k vyhledávání mapu</h3>
                        <div class="btn" @click="metoda1">Najít na mapě</div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import Filtr from "./Filtr.vue";
    import Inzerat from "./Inzerat.vue";
    import Paging from "./Paging.vue";
    import Vyhledavani from "./Vyhledavani.vue";
    import Axios from "axios";
    import VueAxios from 'vue-axios';


    export default {
        name: "Vypis",
        data: function() {
            return {
                appData: {
                    inzeraty : {
                        45 : {
                            nadpis : "Něco",
                            popis: "Něco 2",
                            cena: "Cena",
                            link: "Link"
                        },
                        46 : {
                            nadpis : "Něco",
                            popis: "Něco 2",
                            cena: "Cena",
                            link: "Link"
                        }
                    },
                    totalRecordsCount: 0,

                },
                page: 1,

            }
        },
        props : {
            translationData:{
                type: Object
            },
            assetspath:{
                type: String,
                default: "/"
            },
            bufferSize: {
                type: Number,
                default: 16
            },
            apiurl:{
                type: String,
                default: "/"
            }
        },
        components: { Filtr, Inzerat, Paging, Vyhledavani },
        mounted() {

            this.fetchData();
            this.$root.$on("test", function () {
                console.log("fired");
            })
        },
        methods: {
            metoda1: function () {
                this.$root.$emit("test");
            },
            fetchData: function(){

                var _this = this;
                var getUrl = this.apiurl + "&countPage=" + this.bufferSize + "&page=" + this.page;

                setTimeout(function () {
                    Axios.get(getUrl).then(function (response) {
                        if (response)
                            if(typeof response.data == "object"){
                                _this.appData = response.data.appData;
                            }else{
                                console.error("Data is not type of Object");
                            }
                    }).catch(function (error) {
                        console.error(error);
                    });
                }, 500);
            }
        }
    }
</script>

<style scoped>

</style>