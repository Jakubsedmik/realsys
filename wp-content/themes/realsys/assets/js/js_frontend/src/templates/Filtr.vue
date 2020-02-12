<template>
    <div class="filtr-lista">
        <div class="row underline">
            <div :class="classList()">
                <div class="section-title-special">
                    <h3>Výsledky vyhledávání</h3>
                </div>
            </div>
            <div :class="classList('right')">
                <strong>Řadit dle:</strong>
                <select @change="changeSorting()" ref="sorting" v-model="currentSort">
                    <option value="db_datum_zalozeni">Nejnovější</option>
                    <option value="db_cena">Nejlevnější</option>
                </select>
            </div>
            <div class="col-sm-6 right" v-if="design=='complex'">
                <strong>Nalezených inzerátů:</strong> {{inzeratyCount}}
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Filtr",
        props: {
            'inzeratyCount': {
                type: Number
            },
            'design':{
                type: String,
                default: "complex"
            }
        },
        data: function () {
            return {
                currentSort: "db_cena"
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