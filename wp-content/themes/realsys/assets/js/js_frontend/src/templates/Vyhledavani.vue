<template>
    <section>
        <div class="top-nemovitosti">
            <div class="wrapper">
                <div class="row">
                    <div class="col-sm filtr-blok">
                        <div class="bg-filtr one"></div>

                        <div class="filtr-single" v-for="(filter, index) in filters_first" v-bind:key="index">
                            <label>{{filter.name}}
                                <select name="">
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
                                <select name="">
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

            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Vyhledavani",
        props: [
            'filters'
        ],
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
        }
    }
</script>

<style scoped>

</style>