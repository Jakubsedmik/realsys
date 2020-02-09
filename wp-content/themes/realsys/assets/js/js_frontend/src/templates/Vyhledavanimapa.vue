<template>
    <section>
        <div class="vypis-mapa">
            <div class="wrapper">

                <div class="row">

                    <div class="col-sm">
                        <div class="map" id="map"></div>
                    </div>

                    <div class="col-sm">

                        <Filtr v-bind:inzeratyCount="this.appData.totalRecordsCount">
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
                                v-bind:totalRecordsCount="this.appData.totalRecordsCount"
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
                mapMarkers: []
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
        },
        components: { Filtr, Inzerat, Paging},
        async mounted() {
            // start map
            try {
                const options = {libraries: ['drawing']};
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
                _this.fetchData();
            });

            this.$root.$on("changeSorting", function (sort) {
                _this.sortBy = sort;
                _this.fetchData();
                _this.$forceUpdate();
            });

            this.$root.$on("dataLoaded", function () {

                /* ESTABLISHING MAP */
                var map;
                if(_this.map == null){
                     map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 50.070352, lng: 14.444997},
                        zoom: 3,
                    });

                    var polyOptions = {
                        strokeWeight: 0,
                        fillOpacity: 0.45,
                        editable: true,
                        fillColor: '#FF1493'
                    };

                    var drawingManager = new _this.google.maps.drawing.DrawingManager({
                        drawingMode: google.maps.drawing.OverlayType.POLYGON,
                        drawingControl: true,
                        markerOptions: {
                            draggable: true
                        },
                        polygonOptions: polyOptions
                    });

                    drawingManager.setMap(map);
                    drawingManager.setDrawingMode(_this.google.maps.drawing.OverlayType.POLYGON);

                    _this.map = map;
                }else{
                    map = _this.map;
                }

                /* CLEANING ALL */
                for(var i in _this.appData.inzeraty){
                    var inzerat2 = _this.appData.inzeraty[i];
                    console.log(inzerat2);
                    if('db_marker' in inzerat2){
                        console.log(inzerat2.marker);
                        inzerat2.marker.setMap(null);
                        inzerat2.marker = null;
                    }
                }

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
                    inzerat['db_marker'] = marker;
                    bounds.extend(latLng);
                }

                /* FIT SCREEN TO MARKERS BOUNDS */
                map.fitBounds(bounds);

            });
        },
        methods: {
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
                                _this.$root.$emit("dataLoaded");
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

                /* zde se to musí zastřihnout podle bufferu a podle čísla stránky
                *  defaultně potřebujeme všechny záznamy načtené */
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