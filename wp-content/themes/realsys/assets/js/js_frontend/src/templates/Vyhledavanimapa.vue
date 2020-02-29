<template>
    <section>
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
                mapMarkers: {},
                filteredResults: [],
                markerClusterer: null
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
                default: 4
            },
            apiurl:{
                type: String,
                default: "/"
            },
            home_url:{
                type: String,
                default: 'http://localhost/realsys'
            },
        },
        components: { Filtr, Inzerat, Paging},
        async mounted() {
            // start map
            try {
                const options = {libraries: []};
                const loader = new Loader('AIzaSyDU9RxWxpRRoy9R-wAILv5Owb7GaXHLVaw', options);
                const google = await loader.load();
                this.google = google;

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

            this.$root.$on("dataLoaded", function () {


                /* ESTABLISHING MAP */
                var map;
                if(_this.map == null){
                     map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 50.070352, lng: 14.444997},
                        zoom: 3,
                    });

                    _this.map = map;
                }else{
                    map = _this.map;
                }

                _this.clearMapMarkers();


                /* RENDERING */
                var bounds = new google.maps.LatLngBounds();
                for(var i in _this.appData.inzeraty){

                    var inzerat = _this.appData.inzeraty[i];
                    var latLng = {lat: parseFloat(inzerat.db_lat), lng: parseFloat(inzerat.db_lng)};
                    var marker = new _this.google.maps.Marker({
                        position: latLng,
                        map: map,
                        title: inzerat.db_titulek
                    });

                    _this.mapMarkers[inzerat.db_id] = marker;
                    bounds.extend(latLng);
                }

                var markerCluster = new MarkerClusterer(
                    map,
                    _this.mapMarkers,
                    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'}
                );
                _this.markerClusterer = markerCluster;

                /* FIT SCREEN TO MARKERS BOUNDS */
                map.fitBounds(bounds);


                /* CHANGE BOUDNS LISTENER */

                map.addListener('bounds_changed', debounce(function () {
                    _this.filterResults();
                },500));
            });



        },
        methods: {
            fetchData: function(){
                this.isLoading = true;
                var _this = this;
                var getUrl = this.apiurl + "&getAll=1" + "&sortBy=" + this.sortBy;

                setTimeout(function () {
                    Axios.get(getUrl).then(function (response) {
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
                }, 500);
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
        background-position: center;
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