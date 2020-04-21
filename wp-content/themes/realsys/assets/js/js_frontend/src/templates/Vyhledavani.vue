<template>
    <section>
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

                <!--Filterfield v-bind:filterData="this.filters.db_checkbox" filterName="db_checkbox"></Filterfield-->

                <Hlidacipes
                        v-bind:searchData="this.search_data"
                        v-bind:apiurl="this.apiurl"
                        v-bind:userLogged="this.userLogged"
                        v-bind:home_url="this.home_url"></Hlidacipes>

            </div>
        </div>
    </section>
</template>

<script>

    import Filterfield from "./Filterfield.vue";
    import Hlidacipes from "./Hlidacipes.vue";

    export default {
        name: "Vyhledavani",
        props: [
            'filters', 'filterpreset', 'apiurl', 'userLogged', 'home_url'
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
                search_data: {}
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
            }
        }
    }
</script>

<style scoped>

</style>