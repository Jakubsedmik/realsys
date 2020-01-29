<template>
    <div class="section-paging">
        <a class="btn sub" @click="previousPage()" v-if="page > 1">Předchozí</a>
        <ul class="paging">
            <li
                    v-for="index in totalPages"
                    :class="{active: (page == index)}"
                    @click="changePage(index)"
            >
                {{index}}
            </li>
        </ul>
        <a class="btn sub" @click="nextPage()" v-if="page < this.totalPages.length">Další</a>
    </div>
</template>

<script>
    export default {
        name: "Paging",
        props: [
            'page',
            'inzeratyCount',
            'totalRecordsCount'
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