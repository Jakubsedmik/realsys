<template>

        <label v-if="filterData.type=='select'">
            <span class="labelItself">{{filterData.name}}</span>
            <select :name="filterName" v-model="fieldValue" v-on:change="fireChange">
                <option
                        v-bind:value="key"
                        v-for="(value, key) in filterData.values"
                >
                    {{value}}
                </option>
            </select>
        </label>

        <label v-else-if="filterData.type=='select-special'">
            <span class="labelItself">{{filterData.name}}</span>
            <select :name="filterName" v-model="fieldValue" v-on:change="fireChange">
                <option
                        v-bind:value="key"
                        v-for="(value, key) in filterData.values"
                >
                    {{value.label}}
                </option>
            </select>
        </label>

        <div v-else-if="filterData.type=='slider'">
            <span class="range-nazev">{{filterData.name}}</span>
            <div class="input-wlabel">
                <vue-slider
                        v-model="fieldValue"

                        v-bind:min="min"
                        v-bind:max="max"
                        v-on:change="fireChange"
                        :lazy="true"
                        tooltip="always"
                        :tooltip-placement="'bottom'"
                ></vue-slider>
            </div>
        </div>

        <label v-else-if="filterData.type=='text'">{{filterData.name}}
            <input type="text" v-model="fieldValue" :placeholder="filterData.name" v-on:change="fireChange">
        </label>

        <label v-else-if="filterData.type=='map-search'" class="map-search">{{filterData.name}}
            <vue-google-autocomplete
                    id="map-autocomplete"
                    :classname="filterData.class"
                    :placeholder="filterData.name"
                    v-on:placechanged="generateCordinates"
                    v-on:no-results-found="notFoundCordinates"
                    :value="fieldValue"
                    ref="autocomplete"
                    types="geocode"
            >
            </vue-google-autocomplete>
            <i class="fas fa-times" v-if="autocomplete_value" @click="resetCordinates"></i>
        </label>


        <div class="vyhl-vyb-wrap" v-else-if="filterData.type=='option'">
            <div class="vyhl-radio-label">
                <label>{{filterData.name}}</label>
            </div>

            <div class="vyhl-vyb-colwrap">

                <div class="vyhl-radios">

                    <div class="row selects ico-smaller">
                        <div class="col" v-for="(value, key) in filterData.values">
                            <div class="single-input">
                                <label v-bind:for="filterName + '_' + key" class="form-field">
                                    <span class="sel-input-name">{{value}}</span>
                                    <input v-bind:id="filterName + '_' + key" type="radio" v-bind:name="filterName" v-model="fieldValue" v-bind:value="key" v-on:change="fireChange">
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <label class="check-wrap" v-else-if="filterData.type=='checkbox'">
            <input type="checkbox" v-model="fieldValue" v-on:change="fireChange" v-bind:name="filterName">
            <span class="sel-input-name">{{filterData.name}}</span>
        </label>


        <div class="vyhl-tabs" v-else-if="filterData.type == 'customswitcher'">
            <label class="vyhl-tab" :class="{'active': key == fieldValue}" v-for="(value, key) in filterData.values" v-bind:for="filterName + '_' + key">
                <div class="tab-bullet"></div>{{value}}
                <input v-bind:name="filterName" v-bind:id="filterName + '_' + key" type="radio" v-model="fieldValue" v-bind:value="key" v-on:change="fireChange" style="display: none" class="jcf-ignore">
            </label>
        </div>

</template>

<script>

    import VueSlider from 'vue-slider-component';
    import VueGoogleAutocomplete from 'vue-google-autocomplete'

    export default {
        name: "Filterfield",
        components: {
            VueSlider, VueGoogleAutocomplete
        },
        props: {
            filterData : {
                type: Object
            },
            filterName : {
                type: String
            },
            preset: {
                type: [String, Number],
                required: false,
                default: null
            }
        },
        data: function () {
            return {
                fieldValue: "",
                autocomplete_value: false,
                min: 0,
                max: 100,
                request: {
                    name: "",
                    value: "",
                    operator: ""
                }
            }
        },
        mounted() {

            if(this.filterData.type == "slider"){
                this.min = this.filterData.values[0];
                this.max = this.filterData.values[1];

                var basic = this.filterData.values.slice();
                this.fieldValue = basic;
            }

            if(this.preset != null){
                this.fieldValue = this.preset;
                this.autocomplete_value = true;
            }else{
                if(this.filterData.type == "select" || this.filterData.type == "select-special"){
                    this.fieldValue = -1;
                }
            }
        },
        render() {

        },
        methods: {
            fireChange : function () {
                var operator = "";
                if(this.filterData.type == "select" || this.filterData.type == 'text' || this.filterData.type == 'option' || this.filterData.type == "checkbox" || this.filterData.type== 'customswitcher'){
                    operator = '=';
                }else if(this.filterData.type == "slider"){
                    operator = ['>','<'];
                }else if(this.filterData.type == 'select-special'){
                    operator = this.filterData.values[this.fieldValue].operator;
                }else if(this.filterData.type == 'map-search'){
                    operator = '=';
                }

                var valueForFilter = "";
                if(this.filterData.type == 'checkbox'){
                    valueForFilter = (this.fieldValue ? 1 : -1);
                }else{
                    valueForFilter = this.fieldValue;
                }


                this.request.name = this.filterName;
                this.request.value = valueForFilter;
                this.request.operator = operator;

                this.$root.$emit("fieldChanged", this.request);
            },
            generateCordinates: function (addressData, placeResultData, id) {

                // toto určuje zdali se má zobrazit křížek
                this.autocomplete_value = true;

                // event pro získání výsledků ze serveru
                var request = {
                    multiple: true,
                    values: [{name: "db_lat", value: addressData.latitude, operator: "="}, {name: "db_lng", value: addressData.longitude, operator: "="}]
                };
                this.$root.$emit("fieldChanged", request);

                // event pro zobrazení circle na mapě
                var cordinates = {lat: addressData.latitude, lng: addressData.longitude};
                this.$root.$emit("coordinates_changed", cordinates);
            },
            notFoundCordinates: function (obj) {
                alert("Tuto adresu '" + obj.name + "' jsme nenalezli, prosím vyberte adresu z vyjížděcího seznamu");
                this.$refs['autocomplete'].update(this.fieldValue);
            },
            resetCordinates: function () {
                var request = {
                    multiple: true,
                    values: [{name: "db_lat", value: -1, operator: "="}, {name: "db_lng", value: -1, operator: "="}]
                };
                this.$root.$emit("fieldChanged", request);
                this.$root.$emit("coordinates_changed", false);
                this.fieldValue = "";
                this.autocomplete_value = false;
                this.$refs['autocomplete'].update("");
            }
        }
    }
</script>

<style scoped>
    .vyhl-tab{
        text-transform: none;
        cursor: pointer;
        margin-bottom: 0px;
    }

    .labelItself{
        margin-bottom: .5rem;
        display: inline-block;
    }

    .map-search i{
        position: absolute;
        top: 46%;
        right: 15px;
        color: grey;
        cursor: pointer;
    }

    .map-search i:hover{
        color: #FF951A;
    }
</style>