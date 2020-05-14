<template>

        <label v-if="filterData.type=='select'">{{filterData.name}}
            <select :name="filterName" v-model="fieldValue" v-on:change="fireChange">
                <option
                        v-bind:value="key"
                        v-for="(value, key) in filterData.values"
                >
                    {{value}}
                </option>
            </select>
        </label>

        <label v-else-if="filterData.type=='slider'">{{filterData.name}}<br>
            Minimum: {{fieldValue[0]}}<input type="range" min="0" max="100" v-model.number="fieldValue[0]" v-on:change="fireChange">
            Maximum: {{fieldValue[1]}}<input type="range" min="0" max="100" v-model.number="fieldValue[1]" v-on:change="fireChange">
        </label>

        <label v-else-if="filterData.type=='text'">{{filterData.name}}
            <input type="text" v-model="fieldValue" :placeholder="filterData.name" v-on:change="fireChange">
        </label>

        <div v-else-if="filterData.type=='option'">
            {{filterData.name}}
            <label v-for="(value, key) in filterData.values" v-bind:for="key">
                {{value}}<input v-bind:id="key" type="radio" v-model="fieldValue" v-bind:value="key" v-on:change="fireChange">
            </label>
        </div>

        <label v-else-if="filterData.type=='checkbox'">
            {{filterData.name}}<input type="checkbox" v-model="fieldValue" v-on:change="fireChange">
        </label>

        <div class="vyhl-tabs" v-else-if="filterData.type == 'customswitcher'">
            <label class="vyhl-tab" :class="{'active': key == fieldValue}" v-for="(value, key) in filterData.values" v-bind:for="key">
                <div class="tab-bullet"></div>{{value}}
                <input v-bind:name="filterName" v-bind:id="key" type="radio" v-model="fieldValue" v-bind:value="key" v-on:change="fireChange" style="display: none" class="jcf-ignore">
            </label>
        </div>

</template>

<script>
    export default {
        name: "Filterfield",
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
                fieldValue: ""
            }
        },
        mounted() {
            if(this.filterData.type == 'slider'){
                this.fieldValue = [0,100];
            }
        },
        methods: {
            fireChange : function () {
                var operator = "";
                if(this.filterData.type == "select" || this.filterData.type == 'text' || this.filterData.type == 'option' || this.filterData.type == "checkbox"){
                    operator = '=';
                }else if(this.filterData.type == "slider"){
                    operator = ['>','<'];
                }

                var response = {
                    name: this.filterName,
                    value: this.fieldValue,
                    operator: operator
                };

                this.$root.$emit("fieldChanged", response);
            }
        }
    }
</script>

<style scoped>

</style>