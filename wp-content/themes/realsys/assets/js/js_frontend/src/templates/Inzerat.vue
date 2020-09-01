<template>

    <a :href="this.inzerat.link" :class="getInzeratClass" @mouseover="highlightItem()" @mouseleave="unhighlightItem()">
        <div class="nemovitost-wrapper">
            <div class="nemovitost-image" :style="getFrontImage"></div>
            <div class="nemovitost-text">
                <div class="topInzerat" v-if="inzerat.db_top == 1">{{translations.top}}</div>
                <h3 v-html="getSpecialName"></h3>
                <p>{{getDescription}}</p>
            </div>
            <div class="price-bar">
                <h4 class="price">{{formatMoney}}</h4>
                <a :href="this.inzerat.link" class="btn more">{{translations.detailInzeratu}}</a>
            </div>
        </div>
    </a>
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
                type: [String, Number],
                default: 4
            },
            "translations" : {
                type: Object
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
                var class_name = "col-lg-" + this.proportion;
                var classObj = new Object;
                classObj[class_name] = true;
                classObj['nemovitost'] = true;
                classObj['col-md-6'] = true;
                classObj['col-md-12'] = true;
                if(this.inzerat.db_top == 1){
                    classObj['nemovitost-top'] = true;
                }
                return classObj;
            },
            getDescription(){
                if(this.inzerat.db_popis.length > 100){
                    return this.inzerat.db_popis.substring(0, 100) + "...";
                }else{
                    return this.inzerat.db_popis;
                }
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
    .topInzerat{
        position: absolute;
        top: 20px;
        right: 30px;
        height: 30px;
        width: 30px;
        background-color: #FF970B;
        border-radius: 50%;
        color: white;
        text-align: center;
        line-height: 30px;
        text-transform: uppercase;
        font-size: 10px;
    }
</style>