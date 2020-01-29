<template>
    <div>
        <Vyhledavani v-bind:filters="this.filters"></Vyhledavani>
        <section>
            <div class="top-nemovitosti">
                <div class="wrapper">

                    <Filtr v-bind:inzeratyCount="this.appData.totalRecordsCount">
                    </Filtr>

                    <div :class="{row: true, isLoading: this.isLoading}">
                        <Inzerat
                                v-for="inzerat in this.inzeraty"
                                v-bind:key="inzerat.db_id"
                                v-bind:inzeratData="inzerat"
                                v-bind:currency="appData.currency"
                                v-bind:assetsPath="assetspath">
                        </Inzerat>

                    </div>

                    <Paging
                        v-bind:page="this.page"
                        v-bind:totalRecordsCount="this.appData.totalRecordsCount"
                        v-bind:inzeratyCount="this.bufferSize"
                    ></Paging>

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
                    inzeraty : {},
                    totalRecordsCount: 0,
                },
                page: 1,
                isLoading: true,
                sortBy: Filtr.data().currentSort
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
                default: 8
            },
            apiurl:{
                type: String,
                default: "/"
            },
            filters: {
                type: Object,
                default: function () {
                    return {
                        'db_typ_inzeratu' : {
                            name: 'Typ inzerátu',
                            values: {
                                0 : "Ok",
                                1 : "Bad",
                                2 : "Uff"
                            }
                        },
                        'db_typ_necho' : {
                            name: 'Kategorie',
                            values: {
                                0 : "Ok",
                                1 : "Bad",
                                2 : "Uff"
                            }
                        },
                        'db_typ_inzasderatu' : {
                            name: 'Typ nemovitosti',
                            values: {
                                0 : "Ok",
                                1 : "Bad",
                                2 : "Uff"
                            }
                        },
                        'db_typ_inzeasfratu' : {
                            name: 'Něco',
                            values: {
                                0 : "Ok",
                                1 : "Bad",
                                2 : "Uff"
                            }
                        }
                    }
                }
            }
        },
        components: { Filtr, Inzerat, Paging, Vyhledavani },
        mounted() {

            this.fetchData();
            var _this = this;
            this.$root.$on("changePage", function (page) {
                _this.page = page;
                _this.fetchData();
            });

            this.$root.$on("changeSorting", function (sort) {
                _this.sortBy = sort;
                _this.fetchData();
                _this.$forceUpdate();
            });
        },
        methods: {
            metoda1: function () {
                this.$root.$emit("test");
            },
            fetchData: function(){
                this.isLoading = true;
                var _this = this;
                var getUrl = this.apiurl + "&countPage=" + this.bufferSize + "&page=" + this.page + "&sortBy=" + this.sortBy;

                setTimeout(function () {
                    Axios.get(getUrl).then(function (response) {
                        if (response)
                            if(typeof response.data == "object"){
                                _this.appData = response.data.appData;
                                _this.isLoading = false;
                            }else{
                                console.error("Data is not type of Object");
                            }
                    }).catch(function (error) {
                        console.error(error);
                    });
                }, 500);
            }
        },
        computed: {
            inzeraty: function () {
                var inzeraty = this.appData.inzeraty;
                var sortable = Object.values(inzeraty);

                return sortable.sort(function (x, y) {
                    if(x.order > y.order){
                        return 1;
                    }
                    if(x.order < y.order){
                        return -1;
                    }
                    return 0;
                });
            }
        }
    }
</script>

<style scoped lang="less">

    @website: "/";

    .isLoading:before{
        content: '';
        background-image: url("@{website}wp-content/themes/realsys/assets/images/images_backend/loading.gif");
        position: absolute;
        top: 0;
        left: 0px;
        right: 0px;
        bottom: 0px;
        background-color: rgba(255,255,255,0.5);
        background-position: center;
        background-size: unset;
        background-repeat: no-repeat;
        z-index: 99;
    }

    .top-nemovitosti{
        position: relative;
    }
</style>