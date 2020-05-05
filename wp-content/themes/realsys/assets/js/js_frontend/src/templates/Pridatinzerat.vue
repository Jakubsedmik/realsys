<template>
    <div class="pridat_inz_wrapper">
        <div class="tabs">
            <div v-show="isTabActive(0)">
                <form @submit.prevent="continueForm()">
                    Tab 0

                    <div class="form-group" :class="{ 'form-group--error': $v.modelData.part_first.db_jmeno.$error }" v-if="doesInputAppear('db_jmeno')">
                        <label class="form__label">Jmeno</label>
                        <input class="form__input" v-model.trim="$v.modelData.part_first.db_jmeno.$model"/>
                        <div class="error" v-if="!$v.modelData.part_first.db_jmeno.required">Field is required</div>
                        <div class="error" v-if="!$v.modelData.part_first.db_jmeno.minLength">Name must have at least {{$v.modelData.part_first.db_jmeno.$params.minLength.min}} letters.</div>
                    </div>

                    <button class="btn btn-small" type="submit">Pokračovat</button>
                    <button @click.prevent="changeType">Changetype for test</button>
                </form>



            </div>
            <div v-show="isTabActive(1)">
                Tab 1
                <button @click="prevTab" class="btn">Zpět</button>
            </div>
            <div v-show="isTabActive(2)">Tab 2</div>
            <div v-show="isTabActive(3)">Tab 3</div>
        </div>
    </div>
</template>

<script>

    import { required, minLength, between, requiredIf } from 'vuelidate/lib/validators'

    export default {
        name: "Pridatinzerat",
        props: [
            "frontend_rules", "translations", "options"
        ],
        data: function () {
            return {
                tab_active: 0,
                max_tab_index: 3,
                modelData: {
                    part_first: {
                        db_jmeno: "",
                        db_typ_inzeratu: 1,
                        db_typ_nemovitosti: 1
                    },
                    part_second: {

                    }
                }
            }
        },
        methods: {
            isTabActive: function (index) {
                return index == this.tab_active;
            },
            doesInputAppear: function (fieldName) {
                let matrix = this.fieldsMatrix();
                return matrix.includes(fieldName);
            },
            fieldsMatrix: function () {
                // Pronájem, byt
                if(this.modelData.part_first.db_typ_inzeratu == 1 && this.modelData.part_first.db_typ_nemovitosti == 1){
                    return ['db_id', 'db_podlahova_plocha', 'db_jmeno'];
                }else{
                    return [];
                }
            },
            continueForm: function () {
                this.$v.modelData.part_first.$touch();
                if(!this.$v.modelData.part_first.$invalid){
                    this.nextTab();
                }
            },
            nextTab: function() {
                if((this.tab_active+1) <= this.max_tab_index){
                    this.tab_active++;
                }
            },
            prevTab: function(){
                if((this.tab_active-1) >= 0){
                    this.tab_active--;
                }
            },
            changeType: function () {
                this.modelData.part_first.db_typ_inzeratu = 0;
            }
        },
        validations: {
            modelData: {
                part_first:{
                    db_jmeno: {
                        required: requiredIf(function(){
                            return this.doesInputAppear('db_jmeno');
                        }),
                        minLength: minLength(15)
                    },
                    db_prijmeni: {
                        between: between(20, 30)
                    }
                },
                part_second:{

                }
            }
        }
    }
</script>

<style scoped>
    .error{
        display: none;
    }

    .form-group--error .error{
        display: block;
    }
</style>