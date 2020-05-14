<template>
    <section v-if="false">
        <div class="top-nemovitosti">
            <div class="wrapper">
                <div class="row">
                    <div class="col-sm filtr-blok">
                        <div class="bg-filtr one"></div>

                        <div class="filtr-single" v-for="(filter, index) in filters_first" v-bind:key="index">
                            <label>{{filter.name}}
                                <select :name="index" v-model="search_data[index]" v-on:change="searchResults">
                                    <option
                                            v-bind:value="key"
                                            v-for="(value, key) in filter.values">
                                        {{value}}
                                    </option>
                                </select>
                            </label>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm filtr-blok">
                        <div class="bg-filtr two"></div>

                        <div class="filtr-single" v-for="(filter, index) in filters_second" v-bind:key="index">
                            <label>{{filter.name}}
                                <select :name="index" v-model="search_data[index]" v-on:change="searchResults">
                                    <option
                                            v-bind:value="key"
                                            v-for="(value, key) in filter.values"
                                            >
                                        {{value}}
                                    </option>
                                </select>
                            </label>
                        </div>

                    </div>
                </div>

                <Filterfield v-bind:filterData="this.filters.db_checkbox" filterName="db_checkbox"></Filterfield>

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
                ></Hlidacipes>

            </div>
        </div>
    </section>

    <div class="wrapper" v-else>


        <Filterfield v-bind:filterData="this.filters.db_typ_inzeratu" filterName="db_typ_inzeratu"></Filterfield>



        <div class="vyhl-box bez-mapy light-blue-bg rounded-b shadow-sm p-20 mb-5">
            <form action="">
                <div class="vyhl-filtery">

                    <div class="filtr-row d-flex mb-4">
                        <div class="customSel-wrapper input-wlabel">
                            <label>Typ nemovitosti</label>
                            <select name="db_typ_nemovitosti">
                                <option value="5">Prodej</option>
                                <option value="4">Pronájem</option>
                                <option value="3">Spolubydlení</option>
                                <option value="2">Pozemky</option>
                                <option value="1">Komerční nemovitosti</option>
                                <option value="-1" selected="">-- Bez filtru --</option>
                            </select>
                        </div>

                        <div class="customSel-wrapper input-wlabel">
                            <label>Dispozice</label>
                            <select name="db_typ_nemovitosti">
                                <option value="5">1+KK</option>
                                <option value="4">1+1</option>
                                <option value="-1" selected="">-- Bez filtru --</option>
                            </select>
                        </div>

                        <div class="customSel-wrapper input-wlabel">
                            <label>Lokalita
                                <input type="text" name="db_mesto" placeholder="Lokalita">
                            </label>
                        </div>
                    </div>

                    <div class="range-cena mb-4">
                        <span class="range-nazev">Cena</span>
                        <div class="input-wlabel">
                            <label class="d-flex justify-content-between range-label"><span
                                    class="range-cena-od">0 Kč</span><span class="range-cena-do">3 000 000
                    Kč</span></label>
                            <input value="20,80" type="range" multiple>
                        </div>
                    </div>

                    <transition name="slide">
                        <div class="rozsirene-hledani" v-show="advanced">

                            <div class="range-cena mb-4">
                                <span class="range-nazev">Velikost</span>
                                <div class="input-wlabel">
                                    <label class="d-flex justify-content-between range-label"><span
                                            class="range-cena-od">0 m2</span><span class="range-cena-do">1000 m2
                        </span></label>
                                    <input value="20,80" type="range" multiple>
                                </div>
                            </div>

                            <div class="vyhl-darum-prid">
                                <label>Dátum pridania inzerátu</label>

                                <div class="customSel-wrapper ">
                                    <select name="db_typ_nemovitosti">
                                        <option value="5">Prodej</option>
                                        <option value="4">Pronájem</option>
                                        <option value="3">Spolubydlení</option>
                                        <option value="2">Pozemky</option>
                                        <option value="1">Komerční nemovitosti</option>
                                        <option value="-1" selected="">-- Bez filtru --</option>
                                    </select>
                                </div>
                            </div>


                            <div class="vyhl-vyb-wrap">
                                <div class="vyhl-radio-label">
                                    <label>Vybavenosť</label>
                                </div>

                                <div class="vyhl-vyb-colwrap">


                                    <div class="vyhl-radios">

                                        <div class="row selects ico-smaller">
                                            <div class="col">
                                                <div class="single-input">
                                                    <label class="form-field">
                                                        <span class="sel-input-name">Vybavený</span>
                                                        <input type="radio" name="db_typ_stavby" value="Vybavený">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="single-input">
                                                    <label class="form-field">
                                                        <span class="sel-input-name">Čiastočne</span>
                                                        <input type="radio" name="db_typ_stavby" value="Čiastočne">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="single-input">
                                                    <label class="form-field">
                                                        <span class="sel-input-name">Nevybavený</span>
                                                        <input type="radio" name="db_typ_stavby" value="Nevybavený">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vyhl-sep"></div>


                                    <div class="checks">
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Umývačka</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Práčka</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Chladnička</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Pivnica</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Balkón</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Terasa</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Garáž</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Parkovanie</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Výťah</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div><!-- KONEC ROZSIRENEHO HLEDANI -->
                    </transition>

                    <div class="vyhl-submit d-flex align-items-center justify-content-center  mb-3">
                        <a class="btn mx-2 rozsirene-button" @click="switchSearch">
                            <span v-if="!advanced">Rozšířené vyhledávání</span>
                            <span v-else>Zjednodušené vyhledávání</span>
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</template>

<script>

    import Filterfield from "./Filterfield.vue";
    import Hlidacipes from "./Hlidacipes.vue";

    export default {
        name: "Vyhledavani",
        props: [
            'filters', 'filterpreset', 'user_logged', 'home_url', 'login_link', 'payment_link', 'service', 'currency', 'ajax_url', 'assets_path'
        ],
        components: { Filterfield, Hlidacipes },
        created() {
            if(Object.entries(this.filterpreset).length > 0){
                this.search_data = this.filterpreset;
                this.$nextTick(function () {
                    this.searchResults();
                });
            }

            this.$root.$on("fieldChanged", function (fieldValues) {
                console.log(fieldValues);
            });

        },
        data: function(){
            return {
                search_data: {},
                advanced: false
            }
        },
        computed: {
            filters_first : function () {
                var result = {};
                var loops = 0;
                for(var index in this.filters){
                    if(loops<3){
                        result[index] = this.filters[index];
                    }
                    loops++;
                }
                return result;
            },
            filters_second: function () {
                var result = {};
                var loops = 0;
                for(var index in this.filters){
                    if(loops>=3){
                        result[index] = this.filters[index];
                    }
                    loops++;
                }
                return result;
            }
        },
        methods: {
            searchResults: function (e) {
                var str = "";
                var searchData = this.search_data;
                for(var i in searchData){
                    if (str != "") {
                        str += "&";
                    }
                    str += i + "=" + encodeURIComponent(searchData[i]);
                }

                this.$root.$emit("searchFor", str);
            },
            switchSearch: function () {
                this.advanced = !this.advanced;
            },
            tabClass: function () {

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