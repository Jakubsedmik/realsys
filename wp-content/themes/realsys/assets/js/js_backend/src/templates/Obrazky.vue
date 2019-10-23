<template>
    <form>
        <div class="container">
            <h3 class="mt-4 mb-0">Editace obrázků</h3>
            <p class="mb-3">Editujte obrázky vztažené k inzerátu</p>
            <div class="imagesBox">
                <div :class="{imageItem: true, mainImageItem: obrazek.db_top}" v-for="obrazek in obrazky" v-bind:key="obrazek.db_id">
                    <span class="removeImage" @click="removeItem(obrazek.db_id)"><i class="fas fa-times"></i> </span>
                    <figure class="imgWrap">
                        <img :src="obrazek.db_url">
                    </figure>
                    <input type="text" v-model="obrazek.db_titulek" v-on:change="setParam('db_titulek', obrazek.db_id)" class="caption">
                    <input type="text" v-model="obrazek.db_popisek" v-on:change="setParam('db_popisek', obrazek.db_id)" class="description">
                    <a class="editLink" href=""><i class="fas fa-edit"></i></a>
                    <div :class="{checker:true, checked: obrazek.db_top}" @click="check(obrazek.db_id)"></div>
                </div>
            </div>
            <file-pond
                    name="files"
                    allow-multiple="true"
                    max-files="3"
                    label-idle="Nahrajte další obrázky"
                    accepted-file-types="image/jpeg, image/png"
                    ref="pond"
                    :server="serverConfig()"/>

        </div>
    </form>
</template>

<script>
    import axios from 'axios';
    import VueAxios from 'vue-axios';
    import vueFilePond from 'vue-filepond';

    const FilePond = vueFilePond();


    export default {
        name: "Obrazky",
        components: {
            FilePond
        },
        data: function () {
            return {
                obrazky: [
                    {
                        'db_id' : 1,
                        'db_url' : 'https://i.pinimg.com/736x/2a/f9/2f/2af92f1353153e78cf08cf4df5e92104.jpg',
                        'db_titulek' : 'Speciální titulek',
                        'db_popisek' : 'Speciální popisek',
                        'db_top' : 1
                    },
                    {
                        'db_id' : 2,
                        'db_url' : 'https://i.pinimg.com/736x/2a/f9/2f/2af92f1353153e78cf08cf4df5e92104.jpg',
                        'db_titulek' : 'Speciální titulek',
                        'db_popisek' : 'Speciální popisek',
                        'db_top' : 0
                    },
                    {
                        'db_id' : 3,
                        'db_url' : 'https://i.pinimg.com/736x/2a/f9/2f/2af92f1353153e78cf08cf4df5e92104.jpg',
                        'db_titulek' : 'Speciální titulek',
                        'db_popisek' : 'Speciální popisek',
                        'db_top' : 0
                    },
                    {
                        'db_id' : 4,
                        'db_url' : 'https://i.pinimg.com/736x/2a/f9/2f/2af92f1353153e78cf08cf4df5e92104.jpg',
                        'db_titulek' : 'Speciální titulek',
                        'db_popisek' : 'Speciální popisek',
                        'db_top' : 0
                    },
                    {
                        'db_id' : 5,
                        'db_url' : 'https://i.pinimg.com/736x/2a/f9/2f/2af92f1353153e78cf08cf4df5e92104.jpg',
                        'db_titulek' : 'Speciální titulek',
                        'db_popisek' : 'Speciální popisek',
                        'db_top' : 0
                    }
                ],
                isLoading: false,
                id: 1

            }
        },
        props: {
            'inzerat_id' : {
                default: 5
            },
            'api_link' : {
                default: ''
            },
            'sub_params': {
                default: ''
            }
        },
        methods: {
            removeItem : function (key) {
                this.obrazky = this.obrazky.filter(function (value, index) {
                    if(key == value.db_id){
                        return false;
                    }
                    return true;
                });
            },
            check : function (id) {
                this.obrazky.forEach(function (value, index) {
                    if(value.db_id == id){
                        value.db_top = 1;
                    }else{
                        value.db_top = 0;
                    }
                })
            },
            setParam(param, id){
                console.log(param, id);
                var value = this.obrazky.filter(function (val, index) {
                    if(val.db_id == id){
                        return true;
                    }else{
                        return false;
                    }
                });
                value = value.shift();
                console.log("you should change id" + id + " parameter: " + param + " newvalue " + value);
            },
            handleFileUploaded(response){
                if(response.length > 0){
                    response = JSON.parse(response);
                    if(response.status == 1){
                        this.obrazky.push({
                            'db_id' : response.db_id,
                            'db_url' : response.default_url,
                            'db_titulek' : "",
                            'db_popisek' : "",
                            'db_top': 0
                        });
                    }else{
                        alert("Došlo k chybě při vytváření obrázků");
                    }
                }
            },
            subParams(formData){
                formData.append('action', 'upload');
                formData.append('id', this.id);
                return formData;
            },
            serverConfig: function () {
                return {
                    process: {
                        url: '/realsys/wp-admin/admin-ajax.php',
                        method: 'POST',
                        withCredentials: false,
                        headers: {},
                        timeout: 7000,
                        onload: this.handleFileUploaded,
                        ondata: this.subParams
                    }
                };
            }
        }

    }
</script>

<style scoped>
    .imagesBox{
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
        background-color: #fcfcfc;
        margin: 20px 0px;
        border: 1px solid #dddddd;
        max-height: 780px;
        overflow-y: scroll;
    }

    .removeImage{
        position: absolute;
        background-color: red;
        border-radius: 50%;
        height: 20px;
        width: 20px;
        text-align: center;
        color: white;
        top: -10px;
        right: -10px;
        font-size: 12px;
        line-height: 20px;
        cursor: pointer;
    }

    .removeImage:hover{
        background-color: darkred;
    }

    .imageItem{
        position: relative;
        display: flex;
        flex-direction: column;
        flex-basis: calc((100% - 80px) / 4);
        max-width: calc((100% - 80px) / 4);
        min-width: calc((100% - 80px) / 4);
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #d5d5d5;
        margin: 10px;
    }

    .mainImageItem{
        background-color: #33b5e5;
        color: white;
        border: none;
    }

    .mainImageItem input{
        color: white;
    }

    .imageItem input{
        background-color: transparent;
        border: none;
        text-align: center;
        width: 100%;
        box-shadow: none;
        padding: 0px;
        box-sizing: border-box;
    }

    .imageItem input:focus{
        border: 1px solid #d1d1d1;
        background-color: white;
        color: #333333;
    }

    .imgWrap{
        height: 180px;
        width: 100%;
        margin-bottom: 4px;
    }

    .imgWrap img{
        object-fit: cover;
        object-position: center;
        width: 100%;
        height: 100%;
    }

    .caption{
        font-size: 18px;
        font-weight: bold;
    }

    .description {
        font-size: 14px;
        font-style: italic;
    }

    .checker{
        position: absolute;
        top: 20px;
        left: 20px;
        height: 20px;
        width: 20px;
        border-radius: 50%;
        border: 3px solid #33b5e5;
        cursor: pointer;
    }

    .checker.checked{
        background-color: #33b5e5;
    }

    .editLink{
        color: #666666;
        position: absolute;
        bottom: 3px;
        left: 6px;
        font-size: 10px;
    }

    .imageItem.mainImageItem .editLink{
        color: white;
    }


</style>