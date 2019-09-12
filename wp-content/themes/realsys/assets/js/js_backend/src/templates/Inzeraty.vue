<template>
    <!-- Material input -->
    <div>
    <!-- Material input -->
    <div class="md-form">
        <input type="text" id="search_term" class="form-control" @keyup="search($event)">
        <label for="search_term">Hledat výraz</label>
    </div>
    <table id="dt-material-checkbox dataTable" class="table table-striped " cellspacing="0" width="100%">
        <thead>
        <tr>
            <th
                    v-for="(th,index) in prekladHlavicek"
                    @click="sortBy($event)"
                    :data-sort-param="index"
                    class="sorting"
            >
                {{th}}
            </th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="radek in radkyComputed">
            <td v-for="bunka in radek">{{bunka}}</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <th
                    v-for="(th,index) in prekladHlavicek"
                    v-on:click="sortBy($event)"
                    :data-sort-param="index">
                {{th}}
            </th>
        </tr>
        </tfoot>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination pg-blue">
            <li class="page-item"><a class="page-link">Previous</a></li>
            <li class="page-item"><a class="page-link">1</a></li>
            <li class="page-item"><a class="page-link">2</a></li>
            <li class="page-item"><a class="page-link">3</a></li>
            <li class="page-item"><a class="page-link">Next</a></li>
        </ul>
    </nav>
    </div>
</template>


<script>
module.exports = {
    name: "Inzeraty",
    props: [],
    data: function () {
        return {
            radky: [
                {
                    "db_id": 1,
                    "db_nazev" : "nejaky nazev",
                    "db_obr" : "obr",
                    "uf" : "ufyy"
                },
                {
                    "db_id": 5,
                    "db_nazev" : "picka",
                    "db_obr" : "obr",
                    "uf" : "uf"
                },
                {
                    "db_id": 4,
                    "db_nazev" : "pickm",
                    "db_obr" : "obr",
                    "uf" : "uf"
                }
            ],
            prekladHlavicek: {
                "db_id" : "ID",
                "db_nazev" : "Název",
                "db_obr" : "Obrázek",
                "uf" : "Nějaký uf"
            },
            sortParam: "",
            sortOrder: "",
            searchParam: ""
        }
    },
    methods: {
        sortByPosition: function () {
            console.log("fuck");
        },
        sortBy: function (event) {
            this.sortParam = $(event.target).data("sort-param");
        },
        search: function (event) {
            this.searchParam = $(event.target).val();
        }
    },
    computed:{
        radkyComputed : function () {
            var sortParam = this.sortParam;
            var sortOrder = this.sortOrder;
            var searchTerm = this.searchParam;
            var newarray = this.radky;
            newarray = newarray.filter(function (value, index, arr) {
                for(val in value){
                    var hodnota = value[val];
                    if(typeof hodnota == "number"){
                        hodnota = hodnota.toString();
                    }
                    if(hodnota.search(searchTerm)>=0){
                        return true;
                    }
                }
                return false;
            });
            return newarray.sort(
                function (a, b) {
                    if(a[sortParam] > b[sortParam]){
                        return -1;
                    }
                    if(a[sortParam] < b[sortParam]){
                        return 1;
                    }
                    return 0;
                }
            )
        }
    }
}
</script>

<style scoped>
    p{
        font-size: 35px;
    }
</style>