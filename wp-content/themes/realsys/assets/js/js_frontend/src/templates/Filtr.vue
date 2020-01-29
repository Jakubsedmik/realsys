<template>
    <div class="filtr-lista">
        <div class="row underline">
            <div class="col-sm-3">
                <div class="section-title-special">
                    <h3>Výsledky vyhledávání</h3>
                </div>
            </div>
            <div class="col-sm-3">
                <strong>Řadit dle:</strong>
                <select @change="changeSorting()" ref="sorting" v-model="currentSort">
                    <option value="db_datum_zalozeni">Nejnovější</option>
                    <option value="db_cena">Nejlevnější</option>
                </select>
            </div>
            <div class="col-sm-6 right">
                <strong>Nalezených inzerátů:</strong> {{inzeratyCount}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Filtr",
        props: [
            'inzeratyCount'
        ],
        data: function () {
            return {
                currentSort: "db_cena"
            }
        },
        methods: {
            changeSorting: function () {
                var value  = this.$refs.sorting.value;
                this.$root.$emit("changeSorting", value);
            }
        }
    }
</script>

<style scoped>

</style>