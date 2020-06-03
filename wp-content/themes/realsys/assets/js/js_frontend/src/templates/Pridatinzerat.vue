<template>

    <div class="add-inz-con" v-cloak>
        <div class="wrapper">

            <!-- HEADING -->
            <div class="section-title">
                <h1 class="sz-tit sm-h1">{{translations.vlozeniInzeratu}}</h1>
            </div>


            <!-- NAVIGACE -->
            <div class="row inz-nav tab-inz">
                <div :class="{'col-sm': true, 'nav-box': true, 'tab-inz-btn': true, 'active': isTabActive(0)}">
                    <a class="nav-box-wrap btn tablinks">
                        <h2>{{translations.zakladniInformace}}</h2>
                    </a>
                </div>

                <div :class="{'col-sm': true, 'nav-box': true, 'tab-inz-btn': true, 'active': isTabActive(1)}">
                    <a class="nav-box-wrap btn tablinks">
                        <h2>{{translations.doplnujiciInformace}}</h2>
                    </a>
                </div>


                <div :class="{'col-sm': true, 'nav-box': true, 'tab-inz-btn': true, 'active': isTabActive(2)}">
                    <a class="nav-box-wrap btn tablinks">
                        <h2>{{translations.fotografie}}</h2>
                    </a>
                </div>

                <div :class="{'col-sm': true, 'nav-box': true, 'tab-inz-btn': true, 'active': isTabActive(3)}">
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
                                    <div class="row selects" :class="errorClass('part_first','db_typ_inzeratu')">

                                        <div class="single-input" v-for="value in this.options.typ_inzeratu">
                                            <label class="form-field">

                                                <span class="sel-input-name">{{value.db_translation.value}}</span>
                                                <input type="radio" name="db_typ_inzeratu" :value="value.db_value.value" v-model.trim="$v.modelData.part_first.db_typ_inzeratu.$model" @change="resetForm()">

                                            </label>
                                        </div>
                                        <div class="error" v-if="!$v.modelData.part_first.db_typ_inzeratu.required">{{translations.poleJePovinne}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TYP STAVBY -->
                        <div class="inz-box">
                            <div class="form-content">
                                <h3>{{translations.typNemovitosti}}</h3>
                                <div class="input-content">
                                    <div class="row selects ico-smaller" :class="errorClass('part_first','db_typ_stavby')">

                                        <div class="single-input" v-for="value in this.options.typ_stavby" v-show="allowedValue('db_typ_stavby',parseInt(value.db_value.value))">
                                            <label class="form-field">
                                                <span class="sel-input-name">{{value.db_translation.value}}</span>
                                                <input type="radio" name="db_typ_stavby" :value="value.db_value.value" v-model.trim="$v.modelData.part_first.db_typ_stavby.$model" @change="resetForm()">
                                            </label>
                                        </div>

                                        <div class="error" v-if="!$v.modelData.part_first.db_typ_stavby.required">{{translations.poleJePovinne}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- POCET MISTNOSTI -->
                        <div class="inz-box" v-show="doesInputAppearRequire('db_pocet_mistnosti')">
                            <div class="form-content">
                                <h3>{{translations.dispozice}}</h3>
                                <div class="single-val-form">
                                    <label class="form-field" :class="errorClass('part_first','db_pocet_mistnosti')">
                                        <select name="db_pocet_mistnosti" v-model.trim="$v.modelData.part_first.db_pocet_mistnosti.$model">
                                            <option v-for="index in options.dispozice" :value="index">{{index}}</option>
                                        </select>

                                        <div class="error" v-if="!$v.modelData.part_first.db_pocet_mistnosti.required">{{translations.poleJePovinne}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- ROZLOHA -->
                        <div class="inz-box" v-show="doesInputAppearRequire('db_uzitkova_plocha') || doesInputAppearRequire('db_podlahova_plocha') || doesInputAppearRequire('db_pozemkova_plocha')">
                            <div class="form-content">
                                <h3>{{translations.rozloha}}</h3>
                                <div class="input-content">
                                    <label class="form-field" :class="errorClass('part_first','db_uzitkova_plocha')" v-show="doesInputAppearRequire('db_uzitkova_plocha')">
                                        <input type="number" min="0" name="db_uzitkova_plocha" class="input-outline" :placeholder="translations.uzitkovaPlocha" v-model.trim="$v.modelData.part_first.db_uzitkova_plocha.$model">
                                        <div class="error" v-if="!$v.modelData.part_first.db_uzitkova_plocha.required">{{translations.poleJePovinne}}</div>
                                    </label>
                                    <label class="form-field" :class="errorClass('part_first','db_pozemkova_plocha')" v-show="doesInputAppearRequire('db_pozemkova_plocha')">
                                        <input type="number" min="0" name="db_pozemkova_plocha" class="input-outline" :placeholder="translations.pozemkovaPlocha" v-model.trim="$v.modelData.part_first.db_pozemkova_plocha.$model">
                                        <div class="error" v-if="!$v.modelData.part_first.db_pozemkova_plocha.required">{{translations.poleJePovinne}}</div>
                                    </label>
                                    <label class="form-field" :class="errorClass('part_first','db_podlahova_plocha')" v-show="doesInputAppearRequire('db_podlahova_plocha')">
                                        <input type="number" min="0" name="db_podlahova_plocha" class="input-outline" :placeholder="translations.podlahovaPlocha" v-model.trim="$v.modelData.part_first.db_podlahova_plocha.$model">
                                        <div class="error" v-if="!$v.modelData.part_first.db_podlahova_plocha.required">{{translations.poleJePovinne}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- POLOHA -->
                        <div class="inz-box">
                            <div class="form-content">
                                <h3>{{translations.poloha}}</h3>
                                <div class="input-content">
                                    <label class="form-field" v-show="doesInputAppearRequire('db_mesto')" :class="errorClass('part_first','db_mesto')">
                                        <input type="text" name="db_mesto" class="input-outline" :placeholder="translations.mesto" v-model.trim="$v.modelData.part_first.db_mesto.$model">
                                        <div class="error" v-if="errorAppear('part_first','db_mesto')">{{translations.poleJePovinne}}</div>
                                    </label>
                                    <label class="form-field" v-show="doesInputAppearRequire('db_ulice')" :class="errorClass('part_first','db_ulice')">
                                        <input type="text" name="db_ulice" class="input-outline" :placeholder="translations.ulice" v-model.trim="$v.modelData.part_first.db_ulice.$model">
                                        <div class="error" v-if="errorAppear('part_first','db_ulice')">{{translations.poleJePovinne}}</div>
                                    </label>
                                    <label class="form-field" v-show="doesInputAppearRequire('db_cp')" :class="errorClass('part_first','db_cp')">
                                        <input type="text" name="db_cp" class="input-outline" :placeholder="translations.cp" v-model.trim="$v.modelData.part_first.db_cp.$model">
                                        <div class="error" v-if="errorAppear('part_first','db_cp')">{{translations.poleJePovinne}}</div>
                                    </label>
                                    <label class="form-field" v-show="doesInputAppearRequire('db_psc')" :class="errorClass('part_first','db_psc')">
                                        <input type="text" name="db_psc" class="input-outline" :placeholder="translations.psc" v-model.trim="$v.modelData.part_first.db_psc.$model">
                                        <div class="error" v-if="errorAppear('part_first','db_psc')">{{translations.poleJePovinne}}</div>
                                        <div class="error" v-if="!this.$v.modelData['part_first']['db_psc'].validZip">{{translations.nevalidniPSC}}</div>
                                    </label>
                                    <!-- MESTSKA CAST -->
                                    <label class="form-field" v-show="doesInputAppearRequire('db_mestska_cast')" :class="errorClass('part_first','db_mestska_cast')">
                                        <input type="text" name="db_mestska_cast" class="input-outline" :placeholder="translations.mestskaCast" v-model.trim="$v.modelData.part_first.db_mestska_cast.$model">
                                        <div class="error" v-if="errorAppear('part_first','db_mestska_cast')">{{translations.poleJePovinne}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- CENY -->
                        <div class="inz-box center-inz-box bigger-label" v-show="doesInputAppearRequire('db_cena') || doesInputAppearRequire('db_cena_najem') || doesInputAppearRequire('db_poplatky') || doesInputAppearRequire('db_kauce')">
                            <div class="form-row price-input">
                                <h3>{{translations.cena}}</h3>
                                <div class="currency-input">

                                    <div class="form-field price-field" v-show="doesInputAppearRequire('db_cena')" :class="errorClass('part_first','db_cena')">
                                        <input type="number" :placeholder="translations.cena" step="1" min="0" name="db_cena_najmu" class="input-outline" v-model.trim="$v.modelData.part_first.db_cena.$model">
                                        <span class="currency">{{currency}}</span>
                                        <div class="error" v-if="errorAppear('part_first','db_cena')">{{translations.poleJePovinne}}</div>
                                    </div>

                                    <div class="form-field price-field" v-show="doesInputAppearRequire('db_cena_najem')" :class="errorClass('part_first','db_cena_najem')">
                                        <input type="number" :placeholder="translations.cenaNajmu" step="1" min="0" name="db_cena_najem" class="input-outline" v-model.trim="$v.modelData.part_first.db_cena_najem.$model">
                                        <span class="currency">{{currency}} / {{translations.mesic}}</span>
                                        <div class="error" v-if="errorAppear('part_first','db_cena_najem')">{{translations.poleJePovinne}}</div>
                                    </div>

                                    <div class="form-field price-field" v-show="doesInputAppearRequire('db_poplatky')" :class="errorClass('part_first','db_poplatky')">
                                        <input type="number" :placeholder="translations.poplatky" step="1" min="0" name="db_poplatky" class="input-outline" v-model.trim="$v.modelData.part_first.db_poplatky.$model">
                                        <span class="currency">{{currency}} / {{translations.mesic}}</span>
                                        <div class="error" v-if="errorAppear('part_first','db_poplatky')">{{translations.poleJePovinne}}</div>
                                    </div>

                                    <div class="form-field price-field" v-show="doesInputAppearRequire('db_kauce')" :class="errorClass('part_first','db_kauce')">
                                        <input type="number" :placeholder="translations.kauce" step="1" min="0" name="db_kauce" class="input-outline" v-model.trim="$v.modelData.part_first.db_kauce.$model">
                                        <span class="currency">{{currency}}</span>
                                        <div class="error" v-if="errorAppear('part_first','db_kauce')">{{translations.poleJePovinne}}</div>
                                    </div>
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

                <section id="second" class="inz-form-sec rounded-b shadow-big tabcontent" v-show="isTabActive(1)">
                    <form @submit.prevent="continueForm()">

                        <!-- K DISPOZICI OD -->
                        <div class="inz-box" v-show="doesInputAppearRequire('db_k_dispozici_od')">
                            <div class="form-content">
                                <h3>{{translations.kDispoziciOd}}</h3>
                                <div class="single-val-form">
                                    <label class="form-field" :class="errorClass('part_second','db_k_dispozici_od')">
                                        <input type="date" name="db_k_dispozici_od" class="input-outline" :min="min_date" v-model.trim="$v.modelData.part_second.db_k_dispozici_od.$model">
                                        <div class="error" v-if="errorAppear('part_second','db_k_dispozici_od')">{{translations.poleJePovinne}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <!-- VYBAVENOST -->
                        <div class="inz-box no-border v2" v-show="doesInputAppearRequire('db_vybavenost')">
                            <h3>{{translations.vybavenost}}</h3>
                            <div class="row selects" :class="errorClass('part_second','db_vybavenost')">
                                <div class="col-sm basic-select" v-for="value in this.options.vybavenost">
                                    <label class="form-field">
                                        <span class="sel-input-name">{{value.db_translation.value}}</span>
                                        <input type="radio" name="db_vybavenost" :value="value.db_value.value" v-model.trim="$v.modelData.part_second.db_vybavenost.$model">
                                    </label>
                                </div>
                                <div class="error" v-if="errorAppear('part_second','db_vybavenost')">{{translations.poleJePovinne}}</div>
                            </div>
                        </div>

                        <!-- VYBAVENI -->
                        <div class="inz-box no-border v2">
                            <h3>{{translations.vybaveni}}</h3>
                            <div class="form-row checks">

                                <label class="check-wrap">
                                    <input type="checkbox" name="db_terasa" value="1" v-model.trim="$v.modelData.part_second.db_terasa.$model">
                                    <span class="sel-input-name">{{translations.terasa}}</span>
                                </label>
                                <label class="check-wrap">
                                    <input type="checkbox" name="db_vytah" value="1" v-model.trim="$v.modelData.part_second.db_vytah.$model">
                                    <span class="sel-input-name">{{translations.vytah}}</span>
                                </label>
                                <label class="check-wrap">
                                    <input type="checkbox" name="db_parkovaci_misto" value="1" v-model.trim="$v.modelData.part_second.db_parkovaci_misto.$model">
                                    <span class="sel-input-name">{{translations.parkovani}}</span>
                                </label>
                                <label class="check-wrap">
                                    <input type="checkbox" name="db_garaz" value="1" v-model.trim="$v.modelData.part_second.db_garaz.$model">
                                    <span class="sel-input-name">{{translations.garaz}}</span>
                                </label>
                                <label class="check-wrap">
                                    <input type="checkbox" name="db_balkon" value="1" v-model.trim="$v.modelData.part_second.db_balkon.$model">
                                    <span class="sel-input-name">{{translations.balkon}}</span>
                                </label>

                            </div>
                        </div>

                        <!-- DALŠÍ VYBAVENÍ -->
                        <div class="inz-box" v-show="doesInputAppearRequire('db_dalsi_vybaveni')">
                            <div class="form-content">
                                <h3>{{translations.dalsiVybaveni}}</h3>
                                <div class="input-content">
                                    <label class="form-field" :class="errorClass('part_second','db_dalsi_vybaveni')">
                                        <input type="text" name="db_dalsi_vybaveni" value="" class="input-outline" :placeholder="translations.dalsiVybaveni" v-model.trim="$v.modelData.part_second.db_dalsi_vybaveni.$model">
                                        <div class="error" v-if="errorAppear('part_second','db_dalsi_vybaveni')">{{translations.poleJePovinne}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- PATRA -->
                        <div class="inz-box" v-show="doesInputAppearRequire('db_patro') || doesInputAppearRequire('db_celkem_podlazi')">
                            <div class="form-content">
                                <h3>{{translations.poschodi}}</h3>
                                <div class="input-content">
                                    <label class="form-field" v-show="doesInputAppearRequire('db_patro')" :class="errorClass('part_second','db_patro')">
                                        <select name="db_patro" v-model.trim="$v.modelData.part_second.db_patro.$model">
                                            <option v-for="(val,index) in options.patro" :value="index">{{val}}</option>
                                        </select>
                                        <div class="error" v-if="errorAppear('part_second','db_patro')">{{translations.poleJePovinne}}</div>
                                    </label>
                                    <span class="form-comment">{{translations.z}}</span>
                                    <label class="form-field" v-show="doesInputAppearRequire('db_celkem_podlazi')" :class="errorClass('part_second','db_celkem_podlazi')">
                                        <select name="db_celkem_podlazi" v-model.trim="$v.modelData.part_second.db_celkem_podlazi.$model">
                                            <option v-for="(val,index) in options.celkem_podlazi" :value="index">{{val}}</option>
                                        </select>
                                        <div class="error" v-if="errorAppear('part_second','db_celkem_podlazi')">{{translations.poleJePovinne}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- STAV OBJEKTU -->
                        <div class="inz-box" v-show="doesInputAppearRequire('db_stav_objektu')">
                            <h3>{{translations.stavObjektu}}</h3>
                            <div class="row selects" :class="errorClass('part_second','db_stav_objektu')">
                                <div class="col-sm basic-select" v-for="value in this.options.stav_objektu">
                                    <label class="form-field">
                                        <span class="sel-input-name">{{value.db_translation.value}}</span>
                                        <input type="radio" name="db_stav_objektu" :value="value.db_value.value" v-model.trim="$v.modelData.part_second.db_stav_objektu.$model">

                                    </label>
                                </div>
                                <div class="error" v-if="errorAppear('part_second','db_stav_objektu')">{{translations.poleJePovinne}}</div>
                            </div>
                        </div>

                        <!-- TYP VLASTNICTVÍ -->
                        <div class="inz-box" v-show="doesInputAppearRequire('db_typ_vlastnictvi')">
                            <div class="form-content">
                                <h3>{{translations.vlastnictvi}}</h3>
                                <div class="input-content form-field" :class="errorClass('part_second','db_typ_vlastnictvi')">
                                    <select name="db_typ_vlastnictvi" v-model.trim="$v.modelData.part_second.db_typ_vlastnictvi.$model">
                                        <option v-for="value in options.typ_vlastnictvi" :value="value.db_value.value">{{value.db_translation.value}}</option>
                                    </select>
                                    <div class="error" v-if="errorAppear('part_second','db_typ_vlastnictvi')">{{translations.poleJePovinne}}</div>
                                </div>
                            </div>
                        </div>

                        <!-- TYP STAVBY -->
                        <div class="inz-box" v-show="doesInputAppearRequire('db_material')">
                            <div class="form-content">
                                <h3>{{translations.typStavby}}</h3>
                                <div class="input-content form-field" :class="errorClass('part_second','db_material')">
                                    <select name="db_material" v-model.trim="$v.modelData.part_second.db_material.$model">
                                        <option :value="value.db_value.value" v-for="value in options.material">{{value.db_translation.value}}</option>
                                    </select>
                                    <div class="error" v-if="errorAppear('part_second','db_material')">{{translations.poleJePovinne}}</div>
                                </div>
                            </div>
                        </div>

                        <!-- ENERGETICKÁ HODNOTA -->
                        <div class="inz-box align-left" v-show="doesInputAppearRequire('db_penb')">
                            <div class="form-content">
                                <h3>{{translations.energetickaHodnota}}</h3>
                                <div class="input-content form-field" :class="errorClass('part_second','db_penb')">
                                    <select name="db_penb" v-model.trim="$v.modelData.part_second.db_penb.$model">
                                        <option :value="value.db_value.value" v-for="value in options.penb">{{value.db_translation.value}}</option>
                                    </select>
                                    <div class="error" v-if="errorAppear('part_second','db_penb')">{{translations.poleJePovinne}}</div>
                                </div>
                            </div>
                        </div>

                        <!-- BYT JE VHODNY PRO -->
                        <div class="inz-box" v-show="doesInputAppearRequire('db_vhodny_pro')">
                            <div class="form-content">
                                <h3>{{translations.bytVhodnyPro}}</h3>
                                <div class="input-content">
                                    <label class="form-field" :class="errorClass('part_second','db_vhodny_pro')">
                                        <input type="text" name="db_vhodny_pro" value="" class="input-outline" :placeholder="translations.mladyPar" v-model.trim="$v.modelData.part_second.db_vhodny_pro.$model">
                                        <div class="error" v-if="errorAppear('part_second','db_vhodny_pro')">{{translations.poleJePovinne}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Titulek inzeratu -->
                        <div class="inz-box no-border" v-show="doesInputAppearRequire('db_titulek')">
                            <div class="form-content">
                                <h3>{{translations.titulekInzeratu}}</h3>
                                <div class="input-content">
                                    <label class="form-field" :class="errorClass('part_second','db_titulek')">
                                        <input type="text" name="db_titulek" value="" class="input-outline" :placeholder="translations.titulekInzeratu" v-model.trim="$v.modelData.part_second.db_titulek.$model">
                                        <div class="error" v-if="errorAppear('part_second','db_titulek')">{{translations.poleJePovinne}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- DOPLNUJICI POPIS -->
                        <div class="inz-box no-border" v-show="doesInputAppearRequire('db_popis')">
                            <div class="form-content">
                                <h3>{{translations.doplnujiciPopis}}</h3>
                                <div class="input-content">
                                    <label class="form-field" :class="errorClass('part_second','db_popis')">
                                        <textarea name="db_popis" class="input-outline" :placeholder="translations.doplntePopis" v-model.trim="$v.modelData.part_second.db_popis.$model"></textarea>
                                        <div class="error" v-if="errorAppear('part_second','db_popis')">{{translations.poleJePovinne}}</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="buttons-prevnext">
                            <div class="inz-submit">
                                <button class="btn buttons-prevnext-a" @click.prevent="prevTab()" type="button">{{translations.zpet}}</button>
                            </div>
                            <div class="inz-submit">
                                <button type="submit" class="btn buttons-prevnext-a">{{translations.pokracovat}}</button>
                            </div>
                        </div>

                    </form>
                </section>

                <section id="third" class="inz-form-sec rounded-b shadow-big tabcontent" v-show="isTabActive(2)">
                    <form @submit.prevent="continueForm()">


                        <h2>{{translations.fotografie2}}</h2>
                        <div class="imagesLoader" :class="errorClass('part_third','db_inzerat_obrazky')">
                            <file-pond
                                    name="files"
                                    allow-multiple="true"
                                    max-files="10"
                                    :label-idle="'<i class=\'far fa-image\'></i>' + translations.nahrajteNovy +  '<span class=\'filepond--label-action\'>' + translations.prochazet + '</span>'"
                                    accepted-file-types="image/jpeg, image/png"
                                    ref="pond"
                                    :server="serverConfig()"
                                    :label-file-processing="translations.processing"
                                    :label-file-processing-complete="translations.processingComplete"
                                    :label-file-processing-aborted="translations.processingAborted"
                                    :label-file-processing-error="translations.processingError"
                                    :label-tap-to-cancel="translations.tapCancel"
                                    :label-tap-to-retry="translations.tapRetry"
                                    :label-tap-to-undo="translations.tapUndo"
                                    :label-button-abort-item-processing="translations.abortProcessing"
                                    :label-button-process-item="translations.processItem"
                                    allow-revert="false"
                            />
                            <input type="hidden" v-model.trim="$v.modelData.part_third.db_inzerat_obrazky.$model">
                            <div class="error" v-if="errorAppear('part_third','db_inzerat_obrazky')">{{translations.poleJePovinne}}</div>
                        </div>


                        <div class="frontImage" :class="errorClass('part_third','db_obrazek_front')">
                            <h3>{{translations.vyberteNahledovyObrazek}}</h3>
                            <div class="row image-feed">
                                <div class="col-sm-3 image-choose" :class="imageStyle(image)" v-for="(image,index) in this.modelData.part_third.db_inzerat_obrazky" @click="setFront(image.db_id)">
                                    <div class="image-choose-inside" :style="{backgroundImage: 'url(' + image.gallery_url + ')'}"></div>
                                    <i class="fas fa-times removePhoto" @click.stop="removePhoto(index)"></i>
                                </div>
                            </div>
                            <input type="hidden" v-model.trim="$v.modelData.part_third.db_obrazek_front.$model">
                            <div class="error" v-if="errorAppear('part_third','db_obrazek_front')">{{translations.poleJePovinne}}</div>
                        </div>

                        <div class="buttons-prevnext">
                            <div class="inz-submit">
                                <button @click="prevTab()" type="button" class="btn buttons-prevnext-a">{{translations.zpet}}</button>
                            </div>
                            <div class="inz-submit">
                                <button class="btn buttons-prevnext-a" type="submit">{{translations.pokracovat}}</button>
                            </div>
                        </div>

                    </form>
                </section>

                <section id="fourth" class="inz-form-sec tabcontent inz-sec-4 rounded-b shadow-big" v-show="isTabActive(3)">

                    <div class="inz-box align-left inz-show">

                        <h2>{{translations.nahledPridanehoInzeratu}}</h2>

                        <div class="row">
                            <div class="col-sm-4 nemovitost">

                                <div class="nemovitost-wrapper">
                                    <div class="nemovitost-image" :style="getFrontImage"></div>
                                    <div class="nemovitost-text">

                                        <h3 v-html="getInzeratName"></h3>
                                        <p>{{getDescription}}</p>

                                        <div class="metaInfo-bar">
                                            <div class="infoIco location">
                                                <img :src="frontend_images_path + '/ikony/location.png'" alt=""/>
                                                <span class="metaTxt">{{modelData.part_first.db_mesto}}</span>
                                            </div>
                                            <div class="infoIco size">
                                                <img :src="frontend_images_path + '/ikony/size.png'" alt=""/>
                                                <span class="metaTxt"><span class="">{{modelData.part_first.db_uzitkova_plocha}}</span>m<sup>2</sup></span>
                                            </div>
                                        </div>

                                        <div class="price-bar">
                                            <h4 class="price">{{getPrice}}</h4>
                                            <a v-if="false" class="btn more">{{translations.viceInfo}}</a>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="col-sm col-spacer"></div>

                            <div class="col-sm">
                                <div class="topovani-wrap">

                                    <h3>{{translations.chceteAbyVasPrispevek}}</h3>
                                    <p>{{translations.textPozornost}}</p>

                                    <div class="nemovitost-topovani">
                                        <h4>{{translations.vyzkousejteTopovani}}</h4>
                                        <a class="btn ico-btn" href="#" v-if="false" ><i class="fas fa-star"></i>{{translations.topovat}}</a>
                                        <a href="#" class="simple-link" v-if="false">{{translations.jakToFunguje}}</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="buttons-prevnext">
                        <div class="inz-submit">
                            <button @click.prevent="prevTab()" class="btn buttons-prevnext-a">{{translations.zpet}}</button>
                        </div>
                        <div class="inz-submit">
                            <button type="button" class="btn" @click.prevent="finishForm()">{{translations.dokoncit}}</button>
                        </div>
                    </div>

                    <form ref="finalForm" method="POST" style="display: none;">
                        <div v-for="(val,index) in this.finishedForm">
                            <input type="hidden" :value="val" :name="index" v-if="index !== 'db_inzerat_obrazky'">
                            <select v-else :name="index + '[]'" multiple>
                                <option :value="obr.db_id" v-for="obr in val" selected>{{obr.db_id}}</option>
                            </select>
                        </div>
                    </form>

                </section>

            </div>
        </div>
    </div>
</template>

<script>

    import {required, minLength, between, requiredIf} from 'vuelidate/lib/validators'
    import vueFilePond from 'vue-filepond';

    const FilePond = vueFilePond();

    var rege = RegExp(/^\d{2}-\d{3}$/gm);
    const validZip = (value) => rege.test(value);

    export default {
        name: "Pridatinzerat",
        components: {
            FilePond
        },
        /*
        * typ_stavby 3 = Rodinny dum
        * typ_stavby 4 = Byt
        *
        * typ_inzeratu 5 = Pronájem
        * typ_inzeratu 6 = Prodej
        *
        * */
        props: {
            frontend_rules: {
                type: Object,
                default: function () {
                    return {
                        db_typ_inzeratu: {
                            type: Number,
                            required: true,
                            appear: true
                        },
                        db_typ_stavby: {
                            type: Number,
                            required: true,
                            appear: true,
                            restrictValues: {
                                rule: {db_typ_inzeratu: 3},
                                values: [2]
                            }
                        },
                        db_pocet_mistnosti: {
                            required: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* PRODEJ */
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            appear: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* PRODEJ */
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            type: Number
                        },
                        db_uzitkova_plocha: {
                            required: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            appear: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            type: Number
                        },
                        db_pozemkova_plocha: {
                            required: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 3, db_typ_inzeratu: 1},
                                {db_typ_stavby: 4, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 3, db_typ_inzeratu: 2},
                                {db_typ_stavby: 4, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},

                            ],
                            appear: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 3, db_typ_inzeratu: 1},
                                {db_typ_stavby: 4, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 3, db_typ_inzeratu: 2},
                                {db_typ_stavby: 4, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            type: Number
                        },
                        db_podlahova_plocha: {
                            required: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            appear: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            type: Number
                        },
                        db_mesto: {
                            required: true,
                            appear: true,
                            type: String
                        },
                        db_ulice: {
                            required: true,
                            appear: true,
                            type: String
                        },
                        db_cp: {
                            required: true,
                            appear: true,
                            type: String
                        },
                        db_psc: {
                            required: true,
                            appear: true,
                            type: String
                        },
                        db_mestska_cast: {
                            required: true,
                            appear: true,
                            type: String
                        },
                        db_cena: {
                            required: [
                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 3, db_typ_inzeratu: 2},
                                {db_typ_stavby: 4, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            appear: [
                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 3, db_typ_inzeratu: 2},
                                {db_typ_stavby: 4, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            type: Number
                        },
                        db_cena_najem: {
                            required: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 3, db_typ_inzeratu: 1},
                                {db_typ_stavby: 4, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            appear: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 3, db_typ_inzeratu: 1},
                                {db_typ_stavby: 4, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            type: Number
                        },
                        db_kauce: {
                            required: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 3, db_typ_inzeratu: 1},
                                {db_typ_stavby: 4, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            appear: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 3, db_typ_inzeratu: 1},
                                {db_typ_stavby: 4, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            type: Number
                        },
                        db_poplatky: {
                            required: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 3, db_typ_inzeratu: 1},
                                {db_typ_stavby: 4, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            appear: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 3, db_typ_inzeratu: 1},
                                {db_typ_stavby: 4, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            type: Number
                        },

                        // PART TWO

                        db_k_dispozici_od: {
                            required: true,
                            appear: true,
                            type: Date
                        },
                        db_vybavenost: {
                            required: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            appear: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            type: Number
                        },
                        db_terasa: {
                            required: [
                                // PRONÁJEM
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            appear: [
                                // PRONÁJEM
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            type: Boolean
                        },
                        db_vytah: {
                            required: [
                                // PRONÁJEM
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            appear: [
                                // PRONÁJEM
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            type: Boolean
                        },
                        db_parkovaci_misto: {
                            required: [
                                // PRONÁJEM
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            appear: [
                                // PRONÁJEM
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            type: Boolean
                        },
                        db_garaz: {
                            required: [
                                // PRONÁJEM
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            appear: [
                                // PRONÁJEM
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            type: Boolean
                        },
                        db_balkon: {
                            required: [
                                // PRONÁJEM
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            appear: [
                                // PRONÁJEM
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            type: Boolean
                        },
                        db_dalsi_vybaveni: {
                            required: true,
                            appear: true,
                            type: String
                        },
                        db_patro: {
                            required: [
                                // PRONÁJEM
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},

                            ],
                            appear: [
                                // PRONÁJEM
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                            ],
                            type: Number
                        },
                        db_celkem_podlazi: {
                            required: [
                                // PRONÁJEM
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                            ],
                            appear: [
                                // PRONÁJEM
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                            ],
                            type: Number
                        },
                        db_stav_objektu: {
                            required: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            appear: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            type: Number
                        },
                        db_typ_vlastnictvi: {
                            required: true,
                            appear: true,
                            type: Number
                        },
                        db_material: {
                            required: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            appear: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            type: Number
                        },
                        db_penb: {
                            required: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            appear: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},
                                {db_typ_stavby: 5, db_typ_inzeratu: 1},
                                {db_typ_stavby: 6, db_typ_inzeratu: 1},
                                {db_typ_stavby: 7, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},

                                /* PRODEJ */
                                {db_typ_stavby: 1, db_typ_inzeratu: 2},
                                {db_typ_stavby: 2, db_typ_inzeratu: 2},
                                {db_typ_stavby: 5, db_typ_inzeratu: 2},
                                {db_typ_stavby: 6, db_typ_inzeratu: 2},
                                {db_typ_stavby: 7, db_typ_inzeratu: 2},
                            ],
                            type: Number
                        },
                        db_vhodny_pro: {
                            required: false,
                            appear: [
                                /* PRONÁJEM */
                                {db_typ_stavby: 1, db_typ_inzeratu: 1},
                                {db_typ_stavby: 2, db_typ_inzeratu: 1},

                                /* SPOLUBYDLENÍ */
                                {db_typ_stavby: 2, db_typ_inzeratu: 3},
                            ],
                            type: String
                        },
                        db_popis: {
                            required: false,
                            appear: true,
                            type: String
                        },
                        db_titulek: {
                            required: true,
                            appear: true,
                            type: String
                        },
                        db_inzerat_obrazky: {
                            required: true,
                            appear: true,
                            type: Array
                        },
                        db_obrazek_front: {
                            required: true,
                            appear: true,
                            type: Number
                        }
                    }
                }
            },

            translations: {
                type: Object,
            },
            options: {
                type: Object
            },
            currency: {
                type: String,
                default: "Kč"
            },
            currency_code:{
                type: String,
                default: "CZK",
            },
            lang_code: {
                type: String,
                default: "cs-CZ"
            },
            min_date: {
                type: String,
                default: "2020/05/07"
            },
            uzivatelid: {
                type: Number
            },
            ajax_url: {
                type: String
            },
            frontend_images_path: {
                type: String
            }
        },
        data: function () {
            return {
                tab_active: 0,
                max_tab_index: 3,
                modelData: {
                    part_first: {
                        db_typ_inzeratu: "",
                        db_typ_stavby: "",
                        db_pocet_mistnosti: "",
                        db_uzitkova_plocha: "",
                        db_pozemkova_plocha: "",
                        db_podlahova_plocha: "",
                        db_mesto: "",
                        db_ulice: "",
                        db_cp: "",
                        db_psc: "",
                        db_mestska_cast: "",
                        db_cena: "",
                        db_cena_najem: "",
                        db_kauce: "",
                        db_poplatky: ""
                    },
                    part_second: {
                        db_k_dispozici_od: "",
                        db_vybavenost: "",
                        db_terasa: false,
                        db_vytah: false,
                        db_parkovaci_misto: false,
                        db_garaz: false,
                        db_balkon: false,
                        db_dalsi_vybaveni: "",
                        db_patro: "",
                        db_celkem_podlazi: "",
                        db_stav_objektu: "",
                        db_typ_vlastnictvi: "",
                        db_material: "",
                        db_penb: "",
                        db_vhodny_pro: null,
                        db_titulek: "",
                        db_popis: ""
                    },
                    part_third: {
                        db_inzerat_obrazky: [],
                        db_obrazek_front: ""
                    },
                    part_fourth: {
                        action: 'createInzerat'
                    }
                }
            }
        },
        methods: {
            isTabActive: function (index) {
                return index == this.tab_active;
            },
            doesInputAppearRequire: function(fieldName, requiring = false){
                if(this.frontend_rules.hasOwnProperty(fieldName)){
                    let rule = this.frontend_rules[fieldName];

                    if(rule.hasOwnProperty("appear") && rule.hasOwnProperty("required") && rule.hasOwnProperty("type")){
                        let appear = rule.appear;
                        let required = rule.required;
                        if(requiring){
                            if(typeof required == "boolean"){
                                return required;
                            }else{
                                return this.checkRules(required);
                            }
                        }else{
                            if(typeof appear == "boolean"){
                                return appear;
                            }else{
                                return this.checkRules(appear);
                            }
                        }

                    }else{
                        console.error("Frontend rules doesnt have supported format: " + fieldName);
                        return false;
                    }

                    /*if(rule.hasOwnProperty("visibleForAll")){
                        if(rule.visibleForAll){
                            if(requiring){
                                return rule.required;
                            }
                            return true;
                        }else{
                            return false;
                        }
                    }

                    if(rule.db_typ_stavby.includes(typ_stavby) && rule.db_typ_inzeratu.includes(typ_inzeratu)){
                        if(requiring){
                            return rule.required;
                        }
                        return true;
                    }*/

                }else{
                    return false;
                }
            },
            allowedValue: function(fieldName, fieldValue){
                if(this.frontend_rules.hasOwnProperty(fieldName)){
                    var validation = this.frontend_rules[fieldName];
                    if(validation.hasOwnProperty("restrictValues")){
                        var restrictValues = validation['restrictValues'];
                        var rule = restrictValues['rule'];
                        var values = restrictValues['values'];
                        for(var i in rule){
                            var itemName = i;
                            var ruleValue = rule[i];

                            var totalForm = this.finishedForm;
                            if(totalForm.hasOwnProperty(itemName) && totalForm[itemName] == ruleValue){
                                if(values.includes(fieldValue)){
                                    return true;
                                }
                                return false;
                            }else{
                                return true;
                            }
                        }
                        return true;
                    }
                }
            },
            continueForm: function () {

                var parts = [
                    "part_first",
                    "part_second",
                    "part_third",
                    "part_fourth"
                ];
                var currentPart = parts[this.tab_active];

                this.$v.modelData[currentPart].$touch();
                if (!this.$v.modelData[currentPart].$invalid) {
                    this.nextTab();
                }else{
                    console.warn("Nevalidní form");
                }
            },
            nextTab: function () {
                if ((this.tab_active + 1) <= this.max_tab_index) {
                    this.tab_active++;
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }
            },
            prevTab: function () {
                if ((this.tab_active - 1) >= 0) {
                    this.tab_active--;
                }
            },
            errorClass: function (part,fieldName) {
                return {'form-field--error': this.$v.modelData[part][fieldName].$error, 'required-field' : this.doesInputAppearRequire(fieldName, true)};
            },
            errorAppear: function (part, fieldName) {
                return !this.$v.modelData[part][fieldName].required;
            },
            serverConfig: function () {
                return {
                    process: {
                        url: this.ajax_url,
                        method: 'POST',
                        withCredentials: false,
                        headers: {},
                        timeout: 7000,
                        onload: this.handleFileUploaded,
                        ondata: this.uploadSubParams
                    }
                };
            },
            handleFileUploaded(response){
                if(response.length > 0){
                    response = JSON.parse(response);
                    if(response.status == 1){
                        if(this.modelData.part_third.db_inzerat_obrazky.length<=10){
                            this.modelData.part_third.db_inzerat_obrazky.push({
                                db_id: response.db_id,
                                default_url: response.default_url,
                                gallery_url: response.gallery_url,
                                universal_name: response.universal_name
                            });
                        }else{
                            alert("Více než 10 obrázků není možné nahrát");
                        }
                    }else{
                        alert("Došlo k chybě při vytváření obrázků");
                    }
                }
            },
            uploadSubParams(formData){
                formData.append("action","createInzeratImages");
                formData.append("id", this.uzivatelid);
                return formData;
            },
            setFront(id){
                this.modelData.part_third.db_obrazek_front = id;
            },
            removePhoto(index){
                let arr = this.modelData.part_third.db_inzerat_obrazky;
                for( var i = 0; i < arr.length; i++){
                    if ( i === index) {
                        if(arr[index].db_id == this.modelData.part_third.db_obrazek_front){
                            this.modelData.part_third.db_obrazek_front = false;
                        }
                        arr.splice(i, 1);
                    }
                }
            },
            imageStyle(image){
                return {'selected-image' : image.db_id == this.modelData.part_third.db_obrazek_front}
            },
            finishForm(){
                this.$refs.finalForm.submit();
            },
            checkRules(rules){
                var totalForm = this.finishedForm;

                for(let index in rules){
                    var currentRule = rules[index];


                    var isTrue = true;
                    for(let property in currentRule){
                        if(totalForm.hasOwnProperty(property)){
                            if(totalForm[property] != currentRule[property]){
                                isTrue = false;
                                break;
                            }
                        }else{
                            console.warn("This property doesnt exist in totalForm: " + property);
                        }
                    }

                    if(isTrue){
                        return true;
                    }

                }
                return false;
            },
            resetForm(){
                this.modelData.part_second.db_patro = "";
                this.modelData.part_second.db_celkem_podlazi = "";
                this.modelData.part_first.db_cena = "";
                this.modelData.part_first.db_cena_najem = "";
                this.modelData.part_first.db_poplatky = "";
                this.modelData.part_first.db_kauce = "";
                this.modelData.part_first.db_podlahova_plocha = "";
                this.modelData.part_first.db_pozemkova_plocha = "";
                this.modelData.part_first.db_uzitkova_plocha = "";

            }
        },
        computed: {
            getInzeratName(){
                return this.modelData.part_first.db_mesto + " - " + this.modelData.part_first.db_pocet_mistnosti + " - " + this.modelData.part_first.db_uzitkova_plocha + " m<sup>2</sup>";
            },
            getFrontImage(){
                for(var index in this.modelData.part_third.db_inzerat_obrazky){
                    let obr = this.modelData.part_third.db_inzerat_obrazky[index];
                    if(obr.db_id == this.modelData.part_third.db_obrazek_front){
                        return {"backgroundImage": 'url(' + obr.gallery_url + ')'}
                    }
                }
            },
            getPrice(){

                const formatter = new Intl.NumberFormat(this.lang_code, {
                    style: 'currency',
                    currency: this.currency_code,
                    minimumFractionDigits: 2
                });

                if(this.modelData.part_first.db_typ_inzeratu == 6){
                    return formatter.format(this.modelData.part_first.db_cena_najem) + " ";
                }else if(this.modelData.part_first.db_typ_inzeratu == 5){
                    return formatter.format(this.modelData.part_first.db_cena_najem) + " /" + this.translations.mesic;
                }
            },
            getDescription(){
                if(this.modelData.part_second.db_popis.length > 100){
                    return this.modelData.part_second.db_popis.substring(0, 100) + "...";
                }else{
                    return this.modelData.part_second.db_popis;
                }
            },
            finishedForm(){
                var formData = {...this.modelData.part_first, ...this.modelData.part_second, ...this.modelData.part_third, ...this.modelData.part_fourth};
                formData = JSON.parse(JSON.stringify(formData));

                formData.uzivatelid = this.uzivatelid;

                return formData;
            }
        },
        validations: {
            modelData: {
                part_first: {
                    db_typ_inzeratu: {
                        required
                    },
                    db_typ_stavby: {
                        required
                    },
                    db_pocet_mistnosti: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_pocet_mistnosti", true);
                        })
                    },
                    db_uzitkova_plocha: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_uzitkova_plocha", true);
                        })
                    },
                    db_pozemkova_plocha: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_pozemkova_plocha", true);
                        })
                    },
                    db_podlahova_plocha: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_podlahova_plocha", true);
                        })
                    },
                    db_mesto: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_mesto", true);
                        })
                    },
                    db_ulice: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_ulice", true);
                        })
                    },
                    db_cp: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_cp", true);
                        })
                    },
                    db_psc: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_psc", true);
                        }),
                        validZip
                    },
                    db_mestska_cast: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_mestska_cast", true);
                        })
                    },
                    db_cena: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_cena", true);
                        })
                    },
                    db_cena_najem: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_cena_najem", true);
                        })
                    },
                    db_poplatky: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_poplatky", true);
                        })
                    },
                    db_kauce: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_kauce", true);
                        })
                    }
                },
                part_second: {
                    db_k_dispozici_od: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_k_dispozici_od", true);
                        })
                    },
                    db_vybavenost: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_vybavenost", true);
                        })
                    },
                    db_dalsi_vybaveni: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_dalsi_vybaveni", true);
                        })
                    },
                    db_patro: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_patro", true);
                        })
                    },
                    db_celkem_podlazi: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_celkem_podlazi", true);
                        })
                    },
                    db_stav_objektu: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_stav_objektu", true);
                        })
                    },
                    db_typ_vlastnictvi: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_typ_vlastnictvi", true);
                        })
                    },
                    db_material: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_material", true);
                        })
                    },
                    db_penb: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_penb", true);
                        })
                    },
                    db_vhodny_pro: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_vhodny_pro", true);
                        })
                    },
                    db_popis: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_popis", true);
                        })
                    },
                    db_titulek: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_titulek", true);
                        })
                    },
                    db_terasa: {
                        required: false
                    },
                    db_balkon: {
                        required: false
                    },
                    db_parkovaci_misto: {
                        required: false
                    },
                    db_vytah: {
                        required: false
                    },
                    db_garaz: {
                        required: false
                    }
                },
                part_third: {
                    db_inzerat_obrazky: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_inzerat_obrazky", true);
                        })
                    },
                    db_obrazek_front: {
                        required: requiredIf(function () {
                            return this.doesInputAppearRequire("db_obrazek_front", true);
                        })
                    }
                }
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

    .frontImage, .imagesLoader{
        position: relative;
    }

    .removePhoto{
        position: absolute;
        top: 10px;
        right: 25px;
        background-color: #ff951a;
        color: white;
        width: 30px;
        height: 30px;
        line-height: 30px;
        border-radius: 50%;
    }
</style>