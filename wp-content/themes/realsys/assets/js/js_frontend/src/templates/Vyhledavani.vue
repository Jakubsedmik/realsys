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

            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Vyhledavani",
        props: [
            'filters', 'filterpreset'
        ],
        created() {
            if(Object.entries(this.filterpreset).length > 0){
                this.search_data = this.filterpreset;
                this.$nextTick(function () {
                    this.searchResults();
                });
            }

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
                console.log("TRY TO EMIT");

                this.$root.$emit("searchFor", str);
            }
        }
    }
</script>

<style scoped>

</style>