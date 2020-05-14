<template>
    <div class="d-flex justify-content-center map-paging">
        <div class="section-paging">
            <a class="sub" @click="previousPage()" v-if="page > 1">{{translations.predchozi}}</a>
            <ul class="paging">
                <li
                        v-for="index in totalPages"
                        :class="{active: (page == index)}"
                        @click="changePage(index)"
                >
                    {{index}}
                </li>
            </ul>
            <a class="sub" @click="nextPage()" v-if="page < this.totalPages.length">{{translations.dalsi}}</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Paging",
        props: [
            'page',
            'inzeratyCount',
            'totalRecordsCount',
            'translations'
        ],
        computed: {
            totalPages: function () {
                var arr = [];
                var totalPages = Math.ceil(this.totalRecordsCount / this.inzeratyCount);
                for( var i = 1; i <= totalPages; i++){
                    arr.push(i);
                }
                return arr;
                
            }
        },
        methods: {
            changePage: function (page) {
                this.$root.$emit("changePage", page);
            },
            nextPage: function () {
                var currentPage = this.page + 1;
                this.$root.$emit("changePage", currentPage);
            },
            previousPage: function () {
                var currentPage = this.page - 1;
                this.$root.$emit("changePage", currentPage);
            }
        }
    }
</script>

<style scoped>
    .paging li {
        cursor: pointer;
    }
</style>