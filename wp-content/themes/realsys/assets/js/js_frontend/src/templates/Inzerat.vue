<template>
    <div :class="getInzeratClass" @mouseover="highlightItem()" @mouseleave="unhighlightItem()">
        <div class="nemovitost-wrapper">
            <div class="nemovitost-image" :style="getFrontImage"></div>
            <div class="nemovitost-text">
                <h3 v-html="getSpecialName"></h3>


                <p>{{inzerat.db_popis}}</p>
                <div class="metaInfo-bar">
                    <div class="infoIco location">
                        <img :src="this.assetsPath + 'ikony/location.png'" alt=""/><span class="metaTxt">{{inzerat.db_mesto}}</span>
                    </div>
                    <div class="infoIco size">
                        <img :src="this.assetsPath + 'ikony/size.png'" alt=""/><span class="metaTxt" v-html="getAerial"></span>
                    </div>
                </div>

                <div class="price-bar">
                    <h4 class="price">{{formatMoney}} </h4>
                    <a class="btn more" :href="this.inzerat.link">Více info</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        name: "Inzerat",
        props: {
            "inzeratData" : {
                type: Object
            },
            "assetsPath" : {
                type: String
            },
            "currency" : {
                type: String,
                default: "CZK"
            },
            "home_url" :{
                type: String,
                default: 'http://localhost/realsys'
            },
            "proportion" : {
                type: String,
                default: 3
            }
        },
        data: function () {
            return {
                inzerat: this.inzeratData
            }
        },
        computed: {
            db_cena: function () {
                return this.inzerat.db_cena + " Kč";
            },
            getSpecialName: function(){
                return this.inzerat.db_titulek + ', ' + this.inzerat.db_pocet_mistnosti + ', ' + this.inzerat.db_podlahova_plocha +' m<sup>2</sup>';
            },
            getConnectedName: function () {
                return this.inzerat.db_typ_inzeratu + " - " + this.inzerat.db_pocet_mistnosti + " - " + this.inzerat.db_mesto;
            },
            getAerialName: function() {
                return this.inzerat.db_mesto + ", " + this.inzerat.db_pocet_mistnosti + ", " + this.getAerial();
            },
            getAerial: function() {
                return this.inzerat.db_podlahova_plocha + " m<sup>2</sup>";
            },
            getTotalAerial: function() {
                return this.inzerat.db_pozemkova_plocha + " m<sup>2</sup>";
            },
            formatMoney: function () {
                const formatter = new Intl.NumberFormat('cs-CZ', {
                    style: 'currency',
                    currency: 'CZK',
                    minimumFractionDigits: 0
                });
                return formatter.format(this.inzerat.db_cena);
            },
            getFrontImage: function () {
                var frontImageUrl = {'backgroundImage' : 'url(' + this.assetsPath + "loading.gif"};
                if(this.inzerat.hasOwnProperty("subobjects")){
                    var images = this.inzerat.subobjects.obrazekClass;
                    for(var image in images){
                        if(images[image].db_front.value == 1){
                            frontImageUrl = {'backgroundImage' : 'url(' + this.home_url + images[image].db_url.value + ')'};
                        }
                    }
                }
                return frontImageUrl;
            },
            getInzeratClass: function () {
                var class_name = "col-sm-" + this.proportion;
                var classObj = new Object;
                classObj[class_name] = true;
                classObj['nemovitost'] = true;
                return classObj;
            }
        },
        methods: {
            highlightItem: function () {
                this.$root.$emit("highlightItem", this.inzeratData.db_id);
            },
            unhighlightItem: function () {
                this.$root.$emit("unhighlightItem", this.inzeratData.db_id);
            },
        }

    }
</script>

<style scoped>

</style>