<template>

    <div class="vyhl-razeni d-flex justify-content-end mb-4">

        <div class="d-flex align-items-center mr-auto">
            <strong>{{translations.nalezenychInzeratu}} </strong> {{inzeratyCount}}
        </div>

        <div class="customSel-wrapper d-flex align-items-center">
            <label class="w-auto mr-3">{{translations.raditDle}}</label>
            <select @change="changeSorting()" ref="sorting" v-model="currentSort">
                <option value="db_datum_zalozeni:DESC">{{translations.nejnovejsi}}</option>
                <option value="db_cena:ASC">{{translations.nejlevnejsi}}</option>
            </select>

        </div>
    </div>

</template>

<script>
    export default {
        name: "Filtr",
        props: {
            'inzeratyCount': {
                type: [Number, String]
            },
            'design':{
                type: String,
                default: "complex"
            },
            translations: {
                type: Object
            }
        },
        data: function () {
            return {
                currentSort: "db_datum_zalozeni:DESC",

            }
        },
        methods: {
            changeSorting: function () {
                var value  = this.$refs.sorting.value;
                this.$root.$emit("changeSorting", value);
            },
            classList: function (addClass = '') {
                let className = '';

                if(this.design == 'simple'){
                    className = 'col-sm-6';
                }else{
                    className = 'col-sm-3';
                }

                let response = {};
                response[className] = true;
                if(addClass.length > 0){
                    response[addClass] = true;
                }

                return response;
            }
        },
        computed: {

        }
    }
</script>

<style scoped>

</style>