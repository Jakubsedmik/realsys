<section>
    <div class="slider_sub">
        <div class="wrapper">
            <div class="slider-content">
                <div class="slider-title-second">
                    <h1><strong><?php _e( "Výpis nemovitostí na mapě", "realsys" ); ?></strong></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>

<div class="app">
    <VyhledavaniMapa
            assetspath="<?php echo FRONTEND_IMAGES_PATH; ?>"
            apiurl="<?php echo AJAXURL . "?action=getInzeraty"; ?>"
            home_url="<?php echo home_url(); ?>"
    ></VyhledavaniMapa>
</div>


<!-- TODO MAPA VYPIS -->

<div class="map-vyhl-wrap">
    <section class="map-vyhl row">
        <div class="col-md-6 col-xl-7 mapa-wrap">
            <div class="fixed-mapa" style="height: 100%;">
                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d81932.2129070209!2d14.330994408203084!3d50.07914092730669!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2scz!4v1588522507808!5m2!1sen!2scz"
                        width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0" style="height: 100%;"></iframe>
            </div>

        </div>
        <div class="col-md-6 col-xl-5 vyhl-wrap p-20">
            <div class="vyhl-tabs">
                <a href="#" class="vyhl-tab active">
                    <div class="tab-bullet"></div>
                    Prenájom
                </a>
                <a href="#" class="vyhl-tab">
                    <div class="tab-bullet"></div>
                    Predaj
                </a>
                <a href="#" class="vyhl-tab">
                    <div class="tab-bullet"></div>
                    Spolubývanie
                </a>
            </div>
            <div class="vyhl-box light-blue-bg rounded-b shadow-sm p-20 mb-5">
                <form action="">
                    <div class="vyhl-filtery">

                        <div class="filtr-row d-flex mb-4">
                            <div class="customSel-wrapper input-wlabel">
                                <label>Typ nemovitosti</label>
                                <select name="db_typ_nemovitosti">
                                    <option value="5">Prodej</option>
                                    <option value="4">Pronájem</option>
                                    <option value="3">Spolubydlení</option>
                                    <option value="2">Pozemky</option>
                                    <option value="1">Komerční nemovitosti</option>
                                    <option value="-1" selected="">-- Bez filtru --</option>
                                </select>
                            </div>

                            <div class="customSel-wrapper input-wlabel">
                                <label>Dispozice</label>
                                <select name="db_typ_nemovitosti">
                                    <option value="5">1+KK</option>
                                    <option value="4">1+1</option>
                                    <option value="-1" selected="">-- Bez filtru --</option>
                                </select>
                            </div>

                            <div class="customSel-wrapper input-wlabel">
                                <label>Lokalita
                                    <input type="text" name="db_mesto" placeholder="Lokalita">
                                </label>
                            </div>
                        </div>

                        <div class="range-cena mb-4">
                            <span class="range-nazev">Cena</span>
                            <div class="input-wlabel">
                                <label class="d-flex justify-content-between range-label"><span
                                            class="range-cena-od">0 Kč</span><span class="range-cena-do">3 000 000
										Kč</span></label>
                                <input value="20,80" type="range" multiple>
                            </div>
                        </div>

                        <div class="rozsirene-hledani">

                            <div class="range-cena mb-4">
                                <span class="range-nazev">Velikost</span>
                                <div class="input-wlabel">
                                    <label class="d-flex justify-content-between range-label"><span
                                                class="range-cena-od">0 m2</span><span class="range-cena-do">1000 m2
										</span></label>
                                    <input value="20,80" type="range" multiple>
                                </div>
                            </div>

                            <div class="vyhl-darum-prid">
                                <label>Dátum pridania inzerátu</label>

                                <div class="customSel-wrapper ">
                                    <select name="db_typ_nemovitosti">
                                        <option value="5">Prodej</option>
                                        <option value="4">Pronájem</option>
                                        <option value="3">Spolubydlení</option>
                                        <option value="2">Pozemky</option>
                                        <option value="1">Komerční nemovitosti</option>
                                        <option value="-1" selected="">-- Bez filtru --</option>
                                    </select>
                                </div>
                            </div>


                            <div class="vyhl-vyb-wrap">
                                <div class="vyhl-radio-label">
                                    <label>Vybavenosť</label>
                                </div>

                                <div class="vyhl-vyb-colwrap">


                                    <div class="vyhl-radios">

                                        <div class="row selects ico-smaller">
                                            <div class="col">
                                                <div class="single-input">
                                                    <label class="form-field">
                                                        <span class="sel-input-name">Vybavený</span>
                                                        <input type="radio" name="db_typ_stavby" value="Vybavený">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="single-input">
                                                    <label class="form-field">
                                                        <span class="sel-input-name">Čiastočne</span>
                                                        <input type="radio" name="db_typ_stavby" value="Čiastočne">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="single-input">
                                                    <label class="form-field">
                                                        <span class="sel-input-name">Nevybavený</span>
                                                        <input type="radio" name="db_typ_stavby" value="Nevybavený">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vyhl-sep"></div>


                                    <div class="checks">
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Umývačka</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Práčka</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Chladnička</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Pivnica</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Balkón</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Terasa</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Garáž</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Parkovanie</span>
                                        </label>
                                        <label class="check-wrap">
                                            <input id="zeroValue" type="hidden" value="0" name="">
                                            <input type="checkbox" name="db_terasa" value="1">
                                            <span class="sel-input-name">Výťah</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div><!-- KONEC ROZSIRENEHO HLEDANI -->


                        <div class="vyhl-submit d-flex align-items-center justify-content-center  mb-3">
                            <a class="u-link mx-2 rozsirene-button">Rozšířené vyhledávání</a>
                            <a href="#" class="btn mx-2">Hledat</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="vyhl-razeni d-flex justify-content-end mb-4">
                <div class="customSel-wrapper d-flex align-items-center">
                    <label class="w-auto mr-3">Zoradiť od:</label>
                    <select name="db_typ_nemovitosti">
                        <option value="5">Prodej</option>
                        <option value="4">Pronájem</option>
                        <option value="3">Spolubydlení</option>
                        <option value="2">Pozemky</option>
                        <option value="1">Komerční nemovitosti</option>
                        <option value="-1" selected="">-- Bez filtru --</option>
                    </select>
                </div>
            </div>


            <div class="row nemovitosti-row mapa-nemovitost-row">

                <div class="col-lg-6 col-sm-12 nemovitost">
                    <div class="nemovitost-wrapper">
                        <div class="nemovitost-image"
                             style="background-image: url(&quot;http://szukajdom.eu/wp-content/uploads/system_data/default_4f22e7f1fd7e65913d121129888cb4d9.jpg&quot;);">
                            <div class="like-btn"><img
                                        src="http://szukajdom.eu/wp-content/themes/realsys/assets/images/images_frontend/ikony/location.png"
                                        alt=""></div>
                        </div>
                        <div class="nemovitost-text">
                            <h3>Nový byt, 3+kk, 80 m<sup>2</sup></h3>
                            <p>Nový byt na pronájem</p>
                        </div>
                        <div class="price-bar">
                            <h4 class="price">15&nbsp;000&nbsp;Kč </h4> <a href="http://szukajdom.eu/inzerat/8/"
                                                                           class="btn more">Detail inzerátu</a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 col-sm-12 nemovitost">
                    <div class="nemovitost-wrapper">
                        <div class="nemovitost-image"
                             style="background-image: url(&quot;http://szukajdom.eu/wp-content/uploads/system_data/default_4f22e7f1fd7e65913d121129888cb4d9.jpg&quot;);">
                            <div class="like-btn"><img
                                        src="http://szukajdom.eu/wp-content/themes/realsys/assets/images/images_frontend/ikony/location.png"
                                        alt=""></div>
                        </div>
                        <div class="nemovitost-text">
                            <h3>Nový byt, 3+kk, 80 m<sup>2</sup></h3>
                            <p>Nový byt na pronájem</p>
                        </div>
                        <div class="price-bar">
                            <h4 class="price">15&nbsp;000&nbsp;Kč </h4> <a href="http://szukajdom.eu/inzerat/8/"
                                                                           class="btn more">Detail inzerátu</a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 col-sm-12 nemovitost">
                    <div class="nemovitost-wrapper">
                        <div class="nemovitost-image"
                             style="background-image: url(&quot;http://szukajdom.eu/wp-content/uploads/system_data/default_4f22e7f1fd7e65913d121129888cb4d9.jpg&quot;);">
                            <div class="like-btn"><img
                                        src="http://szukajdom.eu/wp-content/themes/realsys/assets/images/images_frontend/ikony/location.png"
                                        alt=""></div>
                        </div>
                        <div class="nemovitost-text">
                            <h3>Nový byt, 3+kk, 80 m<sup>2</sup></h3>
                            <p>Nový byt na pronájem</p>
                        </div>
                        <div class="price-bar">
                            <h4 class="price">15&nbsp;000&nbsp;Kč </h4> <a href="http://szukajdom.eu/inzerat/8/"
                                                                           class="btn more">Detail inzerátu</a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 col-sm-12 nemovitost">
                    <div class="nemovitost-wrapper">
                        <div class="nemovitost-image"
                             style="background-image: url(&quot;http://szukajdom.eu/wp-content/uploads/system_data/default_4f22e7f1fd7e65913d121129888cb4d9.jpg&quot;);">
                            <div class="like-btn"><img
                                        src="http://szukajdom.eu/wp-content/themes/realsys/assets/images/images_frontend/ikony/location.png"
                                        alt=""></div>
                        </div>
                        <div class="nemovitost-text">
                            <h3>Nový byt, 3+kk, 80 m<sup>2</sup></h3>
                            <p>Nový byt na pronájem</p>
                        </div>
                        <div class="price-bar">
                            <h4 class="price">15&nbsp;000&nbsp;Kč </h4> <a href="http://szukajdom.eu/inzerat/8/"
                                                                           class="btn more">Detail inzerátu</a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 col-sm-12 nemovitost">
                    <div class="nemovitost-wrapper">
                        <div class="nemovitost-image"
                             style="background-image: url(&quot;http://szukajdom.eu/wp-content/uploads/system_data/default_4f22e7f1fd7e65913d121129888cb4d9.jpg&quot;);">
                            <div class="like-btn"><img
                                        src="http://szukajdom.eu/wp-content/themes/realsys/assets/images/images_frontend/ikony/location.png"
                                        alt=""></div>
                        </div>
                        <div class="nemovitost-text">
                            <h3>Nový byt, 3+kk, 80 m<sup>2</sup></h3>
                            <p>Nový byt na pronájem</p>
                        </div>
                        <div class="price-bar">
                            <h4 class="price">15&nbsp;000&nbsp;Kč </h4> <a href="http://szukajdom.eu/inzerat/8/"
                                                                           class="btn more">Detail inzerátu</a>
                        </div>

                    </div>
                </div>


            <div class="d-flex justify-content-center map-paging">
                <div class="section-paging">
                    <ul class="paging">
                        <li class="active">1</li>
                        <li class="">2</li>
                    </ul>
                    <a class="sub">Další</a>
                </div>
            </div>


        </div>
    </section>
</div>
