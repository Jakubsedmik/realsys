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
                <select name="">
                    <option value="">Nejnovější</option>
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

            }
        },
        methods: {
            test: function () {

            }
        }
    }
</script>

<style scoped>

</style>