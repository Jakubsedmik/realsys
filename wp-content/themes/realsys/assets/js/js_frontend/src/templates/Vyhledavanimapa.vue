<template>

    <div class="map-vyhl-wrap" v-if="true">
        <section class="map-vyhl row">
            <div class="col-md-6 col-xl-7 mapa-wrap">
                <div class="map fixed-mapa" id="map"></div>
            </div>

            <div class="col-md-6 col-xl-5 vyhl-wrap p-20">

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
                        v-bind:map_layout="true"
                ></Vyhledavani>

                <Filtr v-bind:inzeratyCount="this.appData.totalRecordsCount" v-bind:translations="translations"></Filtr>

                <div :class="{row: true, isLoading: this.isLoading, 'nemovitosti-row': true, 'mapa-nemovitost-row': true}">

                    <Inzerat
                            v-for="inzerat in this.inzeraty"
                            v-bind:key="inzerat.db_id"
                            v-bind:inzeratData="inzerat"
                            v-bind:currency="appData.currency"
                            v-bind:assetsPath="assetspath"
                            v-bind:translations="translations"
                            proportion="6">
                    </Inzerat>

                    <Paging
                            v-bind:page="this.page"
                            v-bind:totalRecordsCount="this.filteredResults.length"
                            v-bind:inzeratyCount="this.bufferSize"
                            v-bind:translations="this.translations"
                    ></Paging>

                </div>
            </div>

        </section>
    </div>


    <section v-else>
        <div class="vypis-mapa">
            <div class="wrapper">

                <div class="row">

                    <div class="col-sm">
                        <div class="map" id="map"></div>
                    </div>

                    <div class="col-sm">

                        <Filtr
                                v-bind:inzeratyCount="this.appData.totalRecordsCount"
                                design="simple"
                        >
                        </Filtr>

                        <div :class="{row: true, isLoading: this.isLoading}">
                            <Inzerat
                                    v-for="inzerat in this.inzeraty"
                                    v-bind:key="inzerat.db_id"
                                    v-bind:inzeratData="inzerat"
                                    v-bind:currency="appData.currency"
                                    v-bind:assetsPath="assetspath"
                                    proportion="6">
                            </Inzerat>

                        </div>

                        <Paging
                                v-bind:page="this.page"
                                v-bind:totalRecordsCount="this.filteredResults.length"
                                v-bind:inzeratyCount="this.bufferSize"
                                v-bind:translations="this.translations"
                        ></Paging>

                    </div>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
    import {Loader, LoaderOptions} from 'google-maps';

    import Filtr from "./Filtr.vue";
    import Inzerat from "./Inzerat.vue";
    import Paging from "./Paging.vue";
    import Axios from "axios";
    import VueAxios from 'vue-axios';
    import {debounce} from 'lodash';
    import Vyhledavani from "./Vyhledavani.vue";

    export default {
        name: "Vyhledavanimapa",
        data: function() {
            return {
                appData: {
                    inzeraty : {},
                    totalRecordsCount: 0,
                },
                page: 1,
                isLoading: true,
                sortBy: Filtr.data().currentSort,
                google: null,
                map: null,
                circle: null,
                mapMarkers: {},
                filteredResults: [],
                markerClusterer: null,
                searchJson: {}
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
            home_url:{
                type: String,
                default: 'http://localhost/realsys'
            },
            translations: {
                type: Object,
            },
            filters: {
                type: Object
            },
            filterpreset: {
                type: Array,
                default: null
            },
            payment_link: {
                type: String
            },
            login_link: {
                type: String
            },
            user_logged: {
                type: [Boolean, Number]
            },
            service: {
                type: Object
            },
            ajax_url: {
                type: String
            }
        },
        components: { Filtr, Inzerat, Paging, Vyhledavani},
        async mounted() {
            // start map
            try {
                const options = {libraries: ['places', 'drawing']};
                const loader = new Loader('AIzaSyDU9RxWxpRRoy9R-wAILv5Owb7GaXHLVaw', options);
                const google = await loader.load();
                this.google = google;
                window['google'] = google;
                this.$root.$emit("mapsLoaded");

            } catch (error) {
                console.error(error);
            }

            this.fetchData();

            var _this = this;
            this.$root.$on("changePage", function (page) {
                _this.page = page;
            });

            this.$root.$on("changeSorting", function (sort) {
                _this.sortBy = sort;
                _this.fetchData();
                _this.$forceUpdate();
            });

            this.$root.$on("highlightItem", function (itemId) {
                let marker = _this.mapMarkers[itemId];
                marker.setAnimation(google.maps.Animation.BOUNCE);
            });

            this.$root.$on("unhighlightItem", function (itemId) {
                let marker = _this.mapMarkers[itemId];
                marker.setAnimation(null);
            });

            this.$root.$on("searchFor", function (searchFor) {
                _this.searchJson = searchFor;
                _this.fetchData();
            });

            this.$root.$on("coordinates_changed",function (latlon) {

                if(_this.circle !== null){
                    _this.circle.setMap(null);
                }

                if(latlon === false){
                    return false;
                }else{
                    var map = _this.map;
                    const cityCircle = new _this.google.maps.Circle({
                        strokeColor: "#FF0000",
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: "#00ff00",
                        fillOpacity: 0.35,
                        map,
                        center: latlon,
                        radius: 50000
                    });
                    _this.circle = cityCircle;
                }
            });

            this.$root.$on("dataLoaded", function () {


                /* ESTABLISHING MAP */
                if(_this.map == null) {
                    _this.map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 50.070352, lng: 14.444997},
                        zoom: 3,
                    });
                }

                _this.clearMapMarkers();


                if(Object.entries(_this.appData.inzeraty).length > 0){
                    /* RENDERING */
                    var bounds = new google.maps.LatLngBounds();
                    for(var i in _this.appData.inzeraty){

                        var inzerat = _this.appData.inzeraty[i];
                        var latLng = new google.maps.LatLng(parseFloat(inzerat.db_lat),parseFloat(inzerat.db_lng));
                        var marker = new _this.google.maps.Marker({
                            position: latLng,
                            map: _this.map,
                            title: inzerat.db_titulek
                        });

                        _this.mapMarkers[inzerat.db_id] = marker;
                        bounds.extend(latLng);
                    }

                    if(_this.mapMarkers !== null){
                        var markerCluster = new MarkerClusterer(
                            _this.map,
                            _this.mapMarkers,
                            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'}
                        );
                        _this.markerClusterer = markerCluster;
                    }

                    /* FIT SCREEN TO MARKERS BOUNDS */
                    _this.map.fitBounds(bounds);
                }

                _this.filterResults();


                /* CHANGE BOUDNS LISTENER */
                //google.maps.event.clearInstanceListeners(_this.map);
                _this.map.addListener('bounds_changed', debounce(function () {
                    _this.filterResults();
                },500));
            });



        },
        methods: {
            fetchData: function(){
                this.isLoading = true;
                var _this = this;


                var request = {
                    getAll: 1,
                    sortBy: this.sortBy,
                    search: this.searchJson
                };


                Axios.post(_this.apiurl, request).then(function (response) {
                    if (response)
                        if(typeof response.data == "object"){
                            _this.appData = response.data.appData;
                            let count = Object.keys(response.data.appData.inzeraty).length;
                            _this.appData.totalRecordsCount = count;
                            _this.isLoading = false;
                            _this.$root.$emit("dataLoaded");
                        }else{
                            console.error("Data is not type of Object");
                        }
                }).catch(function (error) {
                    console.error(error);
                });

            },
            filterResults: function(){
                var _this = this;
                this.isLoading = true;
                setTimeout(function () {
                    var allItems = _this.appData.inzeraty;
                    var map = _this.map;
                    _this.filteredResults = [];

                    for (var i in allItems){
                        var item = allItems[i];

                        var latLng = {lat: parseFloat(item.db_lat) , lng: parseFloat(item.db_lng)};

                        if( map.getBounds().contains(latLng) ){
                            _this.filteredResults.push(item);
                        }
                    }
                    _this.isLoading = false;
                },200);


            },
            clearMapMarkers: function () {
                /* CLEANING ALL */
                let markery = this.mapMarkers;
                for(var index in markery){
                    var marker = markery[index];
                    marker.setMap(null);
                }
                this.mapMarkers = {};
                if(this.markerClusterer !== null){
                    this.markerClusterer.clearMarkers();
                    this.markerClusterer = null;
                }
            }
        },
        computed: {
            inzeraty: function () {
                var inzeraty = this.filteredResults;
                var sortable = Object.values(inzeraty);

                sortable = sortable.sort(function (x, y) {
                    if(x.order > y.order){
                        return 1;
                    }
                    if(x.order < y.order){
                        return -1;
                    }
                    return 0;
                });


                let page = this.page;
                let bufferSize = this.bufferSize;

                let start = (page-1) * bufferSize;
                let end = page * bufferSize;

                /* zde se to musí zastřihnout podle bufferu a podle čísla stránky
                *  defaultně potřebujeme všechny záznamy načtené */
                return sortable.slice(start,end);


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
        background-position: center 300px;
        background-size: unset;
        background-repeat: no-repeat;
        z-index: 99;
    }

    .top-nemovitosti{
        position: relative;
    }

    .map {
        width: 100%;
        height: 100vh;
    }

</style>