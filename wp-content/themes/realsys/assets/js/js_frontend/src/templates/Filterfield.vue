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

    import VueSlider from 'vue-slider-component'
    import 'vue-slider-component/theme/default.css'

    export default {
        name: "Filterfield",
        components: {
            VueSlider
        },
        props: {
            filterData : {
                type: Object
            },
            filterName : {
                type: String
            }
        },
        data: function () {
            return {
                fieldValue: "",
                min: 0,
                max: 100
            }
        },
        mounted() {
            if(this.filterData.type == "slider"){
                this.min = this.filterData.values[0];
                this.max = this.filterData.values[1]

                var basic = this.filterData.values.slice();
                this.fieldValue = basic;
            }
        },
        created() {

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
                }

                var valueForFilter = "";
                if(this.filterData.type == 'checkbox'){
                    valueForFilter = (this.fieldValue ? 1 : -1);
                }else{
                    valueForFilter = this.fieldValue;
                }

                var response = {
                    name: this.filterName,
                    value: valueForFilter,
                    operator: operator
                };

                this.$root.$emit("fieldChanged", response);
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
</style>