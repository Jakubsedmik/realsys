<template>
    <div class="pridat_inz_wrapper">
        <div class="tabs">
            <div v-show="isTabActive(0)">Tab 0</div>
            <div v-show="isTabActive(1)">Tab 1</div>
            <div v-show="isTabActive(2)">Tab 2</div>
            <div v-show="isTabActive(3)">Tab 3</div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Pridatinzerat",
        props: [
            "frontend_rules"
        ],
        data: function () {
            return {
                tab_active: 0
            }
        },
        methods: {
            isTabActive: function (index) {
                return index == this.tab_active;
            }
        }
    }
</script>

<style scoped>

</style>