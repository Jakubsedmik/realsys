<template>

    <div class="add-inz-con" v-if="true">
        <div class="wrapper">

            <!-- HEADING -->
            <div class="section-title">
                <h1 class="sz-tit sm-h1">{{translations.vlozeniInzeratu}}</h1>
            </div>


            <!-- NAVIGACE -->
            <div class="row inz-nav tab-inz">
                <div class="col-sm nav-box tab-inz-btn active">
                    <a class="nav-box-wrap btn tablinks">
                        <h2>{{translations.zakladniInformace}}</h2>
                    </a>
                </div>

                <div class="col-sm nav-box tab-inz-btn">
                    <a class="nav-box-wrap btn tablinks">
                        <h2>{{translations.doplnujiciInformace}}</h2>
                    </a>
                </div>


                <div class="col-sm nav-box tab-inz-btn">
                    <a class="nav-box-wrap btn tablinks">
                        <h2>{{translations.fotografie}}</h2>
                    </a>
                </div>

                <div class="col-sm nav-box tab-inz-btn">
                    <a class="nav-box-wrap btn tablinks">
                        <h2>{{translations.sumarizace}}</h2>
                    </a>
                </div>
            </div>

            <div class="tabs">

                <section id="first" class="inz-form-sec rounded-b shadow-big tabcontent" v-show="isTabActive(0)">

                    <form @submit.prevent="continueForm()">

                        <!-- TYP INZERATU -->
                        <div class="inz-box">
                            <div class="form-content">
                                <h3>{{translations.typInzeratu}}</h3>
                                <div class="input-content">
                                    <div class="row selects" :class="{ 'form-field--error': $v.modelData.part_first.db_typ_inzeratu.$error }">

                                        <div class="single-input" v-for="value in this.options.typ_inzeratu">
                                            <label class="form-field">

                                                <span class="sel-input-name">{{value.db_translation.value}}</span>
                                                <input type="radio" name="db_typ_inzeratu" :value="value.db_id.value" v-model.trim="$v.modelData.part_first.db_typ_inzeratu.$model">

                                            </label>
                                        </div>
                                        <div class="error" v-if="!$v.modelData.part_first.db_typ_inzeratu.required">Field is required</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TYP STAVBY -->
                        <div class="inz-box">
                            <div class="form-content">
                                <h3>{{translations.typNemovitosti}}</h3>
                                <div class="input-content">
                                    <div class="row selects ico-smaller">

                                        <div class="single-input" v-for="value in this.options.typ_stavby">
                                            <label class="form-field">
                                                <span class="sel-input-name">{{value.db_translation.value}}</span>
                                                <input type="radio" name="db_typ_stavby" :value="value.db_id.value">
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- POCET MISTNOSTI -->
                        <div class="inz-box">
                            <div class="form-content">
                                <h3>{{translations.dispozice}}</h3>
                                <div class="single-val-form">
                                    <label class="form-field">
                                        <select name="db_pocet_mistnosti">
                                            <option value="1+KK">1+KK</option>
                                            <option value="1+1">1+1</option>
                                            <option value="2+1">2+1</option>
                                            <option value="3+1">3+1</option>
                                            <option value="4+1">4+1</option>
                                            <option value="5+1">5+1</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="buttons-prevnext">
                            <div class="inz-submit">
                                <button type="submit" class="btn">{{translations.pokracovat}}</button>
                            </div>
                        </div>

                    </form>
                </section>

                <section id="second" class="inz-form-sec tabcontent" v-show="isTabActive(1)">

                </section>

            </div>
        </div>
    </div>
    <div class="pridat_inz_wrapper" v-else>
        <div class="tabs">
            <div v-show="isTabActive(0)">
                <form @submit.prevent="continueForm()">
                    Tab 0

                    <div class="form-group" :class="{ 'form-group--error': $v.modelData.part_first.db_jmeno.$error }"
                         v-if="doesInputAppear('db_jmeno')">
                        <label class="form__label">Jmeno</label>
                        <input class="form__input" v-model.trim="$v.modelData.part_first.db_jmeno.$model"/>
                        <div class="error" v-if="!$v.modelData.part_first.db_jmeno.required">Field is required</div>
                        <div class="error" v-if="!$v.modelData.part_first.db_jmeno.minLength">Name must have at least
                            {{$v.modelData.part_first.db_jmeno.$params.minLength.min}} letters.
                        </div>
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

    import {required, minLength, between, requiredIf} from 'vuelidate/lib/validators'

    export default {
        name: "Pridatinzerat",
        props: {
            frontend_rules: {},
            translations: {
                type: Object,
                default: function(){
                    return {
                        zakladniInformace: "1. Základní informace",
                        doplnujiciInformace: "2. Doplňující informace",
                        fotografie: "3. Fotografie",
                        sumarizace: "4. Summarizace",
                        vlozeniInzeratu: "Vložení inzerátu",
                        typInzeratu: "Typ inzerátu",
                        typNemovitosti: "Typ nemovitosti",
                        dispozice: "Dispozice",
                        pokracovat: "Pokračovat"
                    }
                }
            },
            options: {
                type: Object
            }
        },
        data: function () {
            return {
                tab_active: 0,
                max_tab_index: 3,
                modelData: {
                    part_first: {
                        db_jmeno: "",
                        db_typ_inzeratu: "",
                        db_typ_nemovitosti: ""
                    },
                    part_second: {}
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
                if (this.modelData.part_first.db_typ_inzeratu == 1 && this.modelData.part_first.db_typ_nemovitosti == 1) {
                    return ['db_id', 'db_podlahova_plocha', 'db_jmeno'];
                } else {
                    return [];
                }
            },
            continueForm: function () {
                this.$v.modelData.part_first.$touch();
                if (!this.$v.modelData.part_first.$invalid) {
                    this.nextTab();
                }else{
                    alert("Nevalidní");
                }
            },
            nextTab: function () {
                if ((this.tab_active + 1) <= this.max_tab_index) {
                    this.tab_active++;
                }
            },
            prevTab: function () {
                if ((this.tab_active - 1) >= 0) {
                    this.tab_active--;
                }
            },
            changeType: function () {
                this.modelData.part_first.db_typ_inzeratu = 0;
            }
        },
        validations: {
            modelData: {
                part_first: {
                    /*db_jmeno: {
                        required: requiredIf(function () {
                            return this.doesInputAppear('db_jmeno');
                        }),
                        minLength: minLength(15)
                    },
                    db_prijmeni: {
                        between: between(20, 30)
                    },*/
                    db_typ_inzeratu: {
                        required
                    }
                },
                part_second: {}
            }
        }
    }
</script>

<style scoped>
    .error {
        display: none;
    }

    .form-field--error .error {
        display: block;
    }
</style>