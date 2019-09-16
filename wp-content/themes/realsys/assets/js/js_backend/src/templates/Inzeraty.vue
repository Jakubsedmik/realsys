<template>
    <!-- Material input -->
    <div :class="{waitingForData: !this.dataReady()}">
        <!-- Material input -->
        <div class="md-form input-group mb-3">
            <input type="text" id="search_term" class="form-control" @keyup="search($event)" placeholder="Hledaný výraz">
            <div class="input-group-append">
                <button class="btn btn-md btn-secondary m-0 px-3" type="button" id="MaterialButton-addon2" @click.prevent="findOnServer()">Dohledat na serveru</button>
            </div>
        </div>
        <table id="dt-material-checkbox dataTable" class="table table-striped " cellspacing="0" width="100%">
            <thead>
            <tr>
                <th v-for="(th,index) in hlavickyComputed" class="sorting">
                    <div class="sortingHandle">
                        <span :class="{'active': isAsc(index), 'fshr-icon': true, 'fas': true, 'fa-sort-down' : true}" :data-sort-param="index" data-sort-order="asc" @click="sortBy($event)">
                        </span>
                        <span :class="{'active': isDesc(index), 'fshr-icon': true, 'fas': true, 'fa-sort-up' : true}" :data-sort-param="index" data-sort-order="desc" @click="sortBy($event)">
                        </span>
                    </div>
                    {{th}}
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="radek in radkyComputed">
                <td v-for="bunka in radek">{{bunka}}</td>
                <!-- TODO if it is url or boolean say something -->
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <!-- TODO remove / edit function -->
                <th
                        v-for="(th,index) in hlavickyComputed"
                        v-on:click="sortBy($event)"
                        :data-sort-param="index">
                    {{th}}
                </th>
            </tr>
            </tfoot>
        </table>
        <nav aria-label="Page navigation example" v-if="showPagination()">
            <ul class="pagination pg-blue">
                <li class="page-item" @click="setPage(1)">
                    <a class="page-link">First</a>
                </li>
                <li
                        v-for="paging in filterPaginationNumbers()"
                        :class="{'page-item': true, 'active': (page == paging)}"
                        @click="setPage(paging)"
                >
                    <a class="page-link">{{paging}}</a>
                </li>

                <li class="page-item" @click="setPage(showPagination())">
                    <a class="page-link">Last</a></li>
            </ul>
        </nav>
    </div>
</template>


<script>
    import axios from 'axios';
    import VueAxios from 'vue-axios';

    export default {
        name: "Inzeraty",
        props: [],
        created: function(){
            this.fetchData();
        },
        data: function () {
            return {
                appData : null,
                sortParam: "",
                sortOrder: "",
                searchParam: "",
                page: 2,
                countPage: 4,
                maxPageCount: 5,
            }
        },
        methods: {
            sortBy: function (event) {
                this.sortOrder = $(event.target).data("sort-order");
                this.sortParam = $(event.target).data("sort-param");
            },
            search: function (event) {
                this.searchParam = $(event.target).val();
            },
            isAsc: function (index) {

                return ((this.sortOrder == "asc") && this.sortParam==index) ? true : false;
            },
            isDesc: function (index) {
                return ((this.sortOrder == "desc") && this.sortParam==index) ? true : false;
            },
            fetchData: function(){
                var _this = this;
                this.appData = null;
                // TODO dodat cestu ze serveru
                var getUrl = "/realsys/appdata.json?countPage=" + _this.countPage + "&page=" + _this.page;
                getUrl += "&searchParam=" + this.searchParam;
                this.searchParam = "";
                setTimeout(function () {
                    axios.get(getUrl).then(function (response) {
                        if (response)
                            _this.appData = response.data;
                    }).catch(function (error) {
                        console.log(error);
                    });
                }, 500);
            },
            dataReady: function () {
                return (this.appData !== null);
            },
            showPagination: function () {
                if(this.dataReady()){
                    var totalRecords = this.appData.totalRecords;
                    var recordsPerPage = this.countPage;
                    var pageNumber = this.page;
                    var currentRecordsCount = this.appData.radky.length;

                    var totalPages = Math.ceil(totalRecords / recordsPerPage);
                    if(totalPages > 1){
                        return totalPages;
                    }
                }
                return false;
            },
            filterPaginationNumbers: function () {
                var pagesCount = this.showPagination();

                if (this.maxPageCount > pagesCount) this.maxPageCount = pagesCount;
                var start = this.page - Math.floor(this.maxPageCount / 2);
                start = Math.max(start, 1);
                start = Math.min(start, 1 + pagesCount - this.maxPageCount);
                // TODO tady předělat do starého JS a nebo použít babel
                return Array.from({length: this.maxPageCount}, (el, i) => start + i);
            },
            setPage: function (page) {
                if(page !== this.page){
                    this.page = page;
                    this.fetchData();
                }
            },
            findOnServer(){
                this.page = 1;
                this.fetchData();
            }
        },
        computed:{
            radkyComputed : function () {
                var sortParam = this.sortParam;
                var sortOrder = this.sortOrder;
                var searchTerm = this.searchParam;
                if(!this.dataReady()) return [];

                var newarray = this.appData.radky;
                newarray = newarray.filter(function (value, index, arr) {
                    for(var val in value){
                        var hodnota = value[val];
                        if(typeof hodnota == "number"){
                            hodnota = hodnota.toString();
                        }
                        if(hodnota.toUpperCase().search(searchTerm.toUpperCase())>=0){
                            return true;
                        }
                    }
                    return false;
                });
                return newarray.sort(
                    function (a, b) {
                        if(a[sortParam] > b[sortParam]){
                            if(sortOrder == "asc"){
                                return -1;
                            }
                            return 1;
                        }
                        if(a[sortParam] < b[sortParam]){
                            if(sortOrder == "asc"){
                                return 1;
                            }
                            return -1;
                        }
                        return 0;
                    }
                )
            },
            hlavickyComputed :function () {
                if(!this.dataReady()) {
                    return [];
                }
                return this.appData.prekladHlavicek;
            }
        }
    }
</script>

<style scoped>
    p {
        font-size: 35px;
    }

    .sortingHandle > *{
        cursor: pointer;
    }

    .sortingHandle{
        color: grey;
    }

    .sortingHandle .active{
        color: black;
    }

    .waitingForData{
        position: relative;
    }

    .waitingForData:after{
        /* TODO REALTIVNI cesty */
        content: '';
        background-image: url("/realsys/wp-content/themes/realsys/assets/images/images_backend/loading.gif");
        position: absolute;
        top: 0;
        left: 0px;
        right: 0px;
        bottom: 0px;
        background-color: rgba(255,255,255,0.5);
        background-position: center;
        background-size: unset;
        background-repeat: no-repeat;
    }
</style>