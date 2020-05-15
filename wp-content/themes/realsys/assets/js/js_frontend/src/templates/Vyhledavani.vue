<template>
    <div :class="{wrapper: !this.map_layout}">

        <Filterfield v-bind:filterData="this.filters.db_typ_inzeratu" filterName="db_typ_inzeratu"></Filterfield>

        <div class="vyhl-box bez-mapy light-blue-bg rounded-b shadow-sm p-20 mb-5">
            <div class="vyhl-filtery">

                <div class="filtr-row d-flex mb-4">
                    <div class="customSel-wrapper input-wlabel">
                        <Filterfield v-bind:filterData="this.filters.db_typ_stavby" filterName="db_typ_stavby"></Filterfield>
                    </div>

                    <div class="customSel-wrapper input-wlabel">
                        <Filterfield v-bind:filterData="this.filters.db_pocet_mistnosti" filterName="db_pocet_mistnosti"></Filterfield>
                    </div>

                    <div class="customSel-wrapper input-wlabel">
                        <Filterfield v-bind:filterData="this.filters.db_lokalita" filterName="db_lokalita"></Filterfield>
                    </div>
                </div>

                <div class="range-cena mb-4">
                    <Filterfield v-bind:filterData="this.filters.db_cena" filterName="db_cena"></Filterfield>
                </div>

                <transition name="slide">
                    <div class="rozsirene-hledani" v-show="advanced">

                        <div class="range-cena mb-4">
                            <Filterfield v-bind:filterData="this.filters.db_podlahova_plocha" filterName="db_podlahova_plocha"></Filterfield>
                        </div>

                        <div class="vyhl-darum-prid">
                            <Filterfield v-bind:filterData="this.filters.db_datum_zalozeni" filterName="db_datum_zalozeni"></Filterfield>
                        </div>


                        <Filterfield v-bind:filterData="this.filters.db_vybavenost" filterName="db_vybavenost"></Filterfield>

                        <div class="vyhl-sep"></div>

                        <div class="vyhl-vyb-wrap">

                            <div class="vyhl-vyb-colwrap">

                                <div class="checks">

                                    <Filterfield v-bind:filterData="this.filters.db_balkon" filterName="db_balkon"></Filterfield>
                                    <Filterfield v-bind:filterData="this.filters.db_terasa" filterName="db_terasa"></Filterfield>
                                    <Filterfield v-bind:filterData="this.filters.db_garaz" filterName="db_garaz"></Filterfield>
                                    <Filterfield v-bind:filterData="this.filters.db_parkovaci_misto" filterName="db_parkovaci_misto"></Filterfield>
                                    <Filterfield v-bind:filterData="this.filters.db_vytah" filterName="db_vytah"></Filterfield>

                                </div>

                            </div>
                        </div>

                    </div><!-- KONEC ROZSIRENEHO HLEDANI -->
                </transition>

                <div class="vyhl-submit d-flex align-items-center justify-content-center  mb-3">
                    <a class="btn mx-2 rozsirene-button" @click="switchSearch">
                        <span v-if="!advanced">{{translations.rozsireneVyhledavani}}</span>
                        <span v-else>{{translations.zjednoduseneVyhledavani}}</span>
                    </a>
                </div>

            </div>
        </div>

        <Hlidacipes
                v-bind:search_data="this.search_data"
                v-bind:user_logged="this.user_logged"
                v-bind:home_url="this.home_url"
                v-bind:login_link="this.login_link"
                v-bind:payment_link="this.payment_link"
                v-bind:service="this.service"
                v-bind:currency="this.currency"
                v-bind:ajax_url="this.ajax_url"
                v-bind:assets_path="this.assets_path"
                v-bind:translations="this.translations"
        ></Hlidacipes>

    </div>
</template>

<script>

    import Filterfield from "./Filterfield.vue";
    import Hlidacipes from "./Hlidacipes.vue";

    export default {
        name: "Vyhledavani",
        props: [
            'filters', 'filterpreset', 'user_logged', 'home_url', 'login_link', 'payment_link', 'service', 'currency', 'ajax_url', 'assets_path', 'translations', 'map_layout'
        ],
        components: { Filterfield, Hlidacipes },
        created() {

            if(Object.entries(this.filterpreset).length > 0){
                this.search_data = this.filterpreset;
                this.$nextTick(function () {
                    this.searchResults();
                });
            }

            var _this = this;
            this.$root.$on("fieldChanged", function (fieldValues) {
                var entryName = fieldValues.name;

                var found = false;
                for (var index in _this.search_data){
                    if(_this.search_data[index].name == entryName){
                        _this.search_data[index] = fieldValues;
                        found = true;
                    }
                }
                if(!found){
                    _this.search_data.push(fieldValues);
                }
                _this.searchResults();
            });

        },
        data: function(){
            return {
                search_data: [],
                advanced: false
            }
        },
        methods: {
            searchResults: function (e) {
                this.$root.$emit("searchFor", this.search_data);
            },

            switchSearch: function () {
                this.advanced = !this.advanced;
            }
        }
    }
</script>

<style scoped>
    .slide-enter-active {
        -moz-transition-duration: 0.3s;
        -webkit-transition-duration: 0.3s;
        -o-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -moz-transition-timing-function: ease-in;
        -webkit-transition-timing-function: ease-in;
        -o-transition-timing-function: ease-in;
        transition-timing-function: ease-in;
    }

    .slide-leave-active {
        -moz-transition-duration: 0.3s;
        -webkit-transition-duration: 0.3s;
        -o-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -moz-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
        -webkit-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
        -o-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
        transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
    }

    .slide-enter-to, .slide-leave {
        max-height: 400px;
        overflow: hidden;
    }

    .slide-enter, .slide-leave-to {
        overflow: hidden;
        max-height: 0;
    }
</style>