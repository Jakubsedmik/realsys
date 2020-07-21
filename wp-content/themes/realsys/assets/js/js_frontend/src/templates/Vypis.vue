<template>
    <div>
        <Vyhledavani
                v-bind:filters="this.filters"
                v-bind:filterpreset="this.filterpreset"
                v-bind:user_logged="this.user_logged"
                v-bind:home_url="this.home_url"
                v-bind:login_link="this.login_link"
                v-bind:payment_link="this.payment_link"
                v-bind:service="this.service"
                v-bind:currency="this.appData.currency"
                v-bind:ajax_url="this.ajax_url"
                v-bind:assets_path="this.assetspath"
                v-bind:translations="this.translations"
                v-bind:map_layout="false"
                v-bind:location="this.location"
        ></Vyhledavani>
        <section>
            <div class="wrapper">

                <Filtr v-bind:inzeratyCount="this.appData.totalRecordsCount" v-bind:translations="translations"></Filtr>


                <div :class="{row: true, 'nemovitosti-row' : true, isLoading: this.isLoading}">
                    <Inzerat
                            v-for="inzerat in this.inzeraty"
                            v-bind:key="inzerat.db_id"
                            v-bind:inzeratData="inzerat"
                            v-bind:currency="appData.currency"
                            v-bind:assetsPath="assetspath"
                            v-bind:home_url="home_url"
                            v-bind:translations="translations">
                    </Inzerat>
                </div>

                <Paging
                    v-bind:page="this.page"
                    v-bind:totalRecordsCount="this.appData.totalRecordsCount"
                    v-bind:inzeratyCount="this.bufferSize"
                    v-bind:translations="translations"
                ></Paging>

                <div class="show-on-map">
                    <h3>{{translations.pouzijteKVyhledavaniMapu}}</h3>
                    <div class="btn">{{translations.najitNaMape}}</div>
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
                sortBy: Filtr.data().currentSort,
                searchJson: {}
            }
        },
        props : {
            translationData:{
                type: Object
            },
            user_logged: {
                type: [Number, Boolean],
                default: false
            },
            home_url:{
                type: String,
                default: 'http://localhost/realsys'
            },
            assetspath:{
                type: String,
                default: "/"
            },
            bufferSize: {
                type: Number,
                default: 9
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
            },
            filterpreset : {
                type: [Array, Object],
                default: null
            },
            login_link: {
                type: String
            },
            payment_link: {
                type: String
            },
            service:{
                type: Object
            },
            ajax_url:{
                type: String
            },
            translations: {
                type: Object
            },
            location: {
                type: Object,
                required: false
            }
        },
        components: { Filtr, Inzerat, Paging, Vyhledavani },
        mounted() {


            if(Object.entries(this.filterpreset) == 0 ){
                this.fetchData();
            }

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

            this.$root.$on("searchFor", function (searchFor) {
                _this.searchJson = searchFor;
                _this.fetchData();
            });
        },
        methods: {
            fetchData: function(){
                this.isLoading = true;
                var _this = this;


                var request = {
                    countPage: this.bufferSize,
                    page: this.page,
                    sortBy: this.sortBy,
                    search: this.searchJson
                };



                setTimeout(function () {
                    Axios.post(_this.apiurl, request).then(function (response) {
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
        background-position: center 200px;
        background-size: unset;
        background-repeat: no-repeat;
        z-index: 99;
    }

    .top-nemovitosti{
        position: relative;
    }
</style>