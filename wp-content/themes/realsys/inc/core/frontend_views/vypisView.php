<div class="app">
    <Vypis
            assetspath="<?php echo FRONTEND_IMAGES_PATH; ?>"
            apiurl="<?php echo AJAXURL . "?action=getInzeraty"; ?>"
            home_url="<?php echo home_url(); ?>"
            login_link="<?php echo Tools::getFERoute( "uzivatelClass", false, "login" ); ?>"
            payment_link="<?php echo Tools::getFERoute( "objednavkaClass" ); ?>"
            ajax_url="<?php echo AJAXURL; ?>"

            :filters="<?php echo $this->requestData['filter']; ?>"
            :filterpreset="<?php echo $this->requestData['filterPreset']; ?>"
            :user_logged="<?php echo ( uzivatelClass::getUserLoggedId() ) ? uzivatelClass::getUserLoggedId() : "false"; ?>"
            :service="<?php global $cenik_sluzeb;
			echo Tools::prepareJsonToOutputHtmlAttr( $cenik_sluzeb[0] ); ?>"
    >
    </Vypis>
</div>

<!-- TODO NOVÁ VERZE -->s

<div class="wrapper">
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

    <!--
    <div class="vyhl-box bez-mapy light-blue-bg rounded-b shadow-sm p-20 mb-5">
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

                </div>


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

    <div class="row nemovitosti-row">

        <div class="col-lg-4 col-md-6 col-sm-12 nemovitost">
            <div class="nemovitost-wrapper">
                <div class="nemovitost-image"
                     style="background-image: url(&quot;http://szukajdom.eu/wp-content/uploads/system_data/default_4f22e7f1fd7e65913d121129888cb4d9.jpg&quot;);">
                </div>
                <div class="nemovitost-text">
                    <h3>Nový byt, 3+kk, 80 m<sup>2</sup></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed bibendum varius mi, ac venenatis purus convallis eu. Ut blandit fringilla massa, eu mattis lorem posuere a. </p>
                </div>
                <div class="price-bar">
                    <h4 class="price">15&nbsp;000&nbsp;Kč </h4> <a href="http://szukajdom.eu/inzerat/8/" class="btn more">Detail inzerátu</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 nemovitost">
            <div class="nemovitost-wrapper">
                <div class="nemovitost-image"
                     style="background-image: url(&quot;http://szukajdom.eu/wp-content/uploads/system_data/default_4f22e7f1fd7e65913d121129888cb4d9.jpg&quot;);">
                </div>
                <div class="nemovitost-text">
                    <h3>Nový byt, 3+kk, 80 m<sup>2</sup></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed bibendum varius mi, ac venenatis purus convallis eu. Ut blandit fringilla massa, eu mattis lorem posuere a. </p>
                </div>
                <div class="price-bar">
                    <h4 class="price">15&nbsp;000&nbsp;Kč </h4> <a href="http://szukajdom.eu/inzerat/8/" class="btn more">Detail inzerátu</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 nemovitost">
            <div class="nemovitost-wrapper">
                <div class="nemovitost-image"
                     style="background-image: url(&quot;http://szukajdom.eu/wp-content/uploads/system_data/default_4f22e7f1fd7e65913d121129888cb4d9.jpg&quot;);">
                </div>
                <div class="nemovitost-text">
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                    <p>Sed bibendum varius mi. </p>
                </div>
                <div class="price-bar">
                    <h4 class="price">15&nbsp;000&nbsp;Kč </h4> <a href="http://szukajdom.eu/inzerat/8/" class="btn more">Detail inzerátu</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 nemovitost">
            <div class="nemovitost-wrapper">
                <div class="nemovitost-image"
                     style="background-image: url(&quot;http://szukajdom.eu/wp-content/uploads/system_data/default_4f22e7f1fd7e65913d121129888cb4d9.jpg&quot;);">
                </div>
                <div class="nemovitost-text">
                    <h3>Nový byt, 3+kk, 80 m<sup>2</sup></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed bibendum varius mi, ac venenatis purus convallis eu. Ut blandit fringilla massa, eu mattis lorem posuere a. </p>
                </div>
                <div class="price-bar">
                    <h4 class="price">15&nbsp;000&nbsp;Kč </h4> <a href="http://szukajdom.eu/inzerat/8/" class="btn more">Detail inzerátu</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 nemovitost nemovitost-top">
            <div class="nemovitost-wrapper">
                <div class="nemovitost-image"
                     style="background-image: url(&quot;http://szukajdom.eu/wp-content/uploads/system_data/default_4f22e7f1fd7e65913d121129888cb4d9.jpg&quot;);">
                </div>
                <div class="nemovitost-text">
                    <h3>Sed bibendum varius mi, ac venenatis purus convallis eu. Ut blandit fringilla massa, eu mattis lorem posuere a.</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.  </p>
                </div>
                <div class="price-bar">
                    <h4 class="price">15&nbsp;000&nbsp;Kč </h4> <a href="http://szukajdom.eu/inzerat/8/" class="btn more">Detail inzerátu</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 nemovitost">
            <div class="nemovitost-wrapper">
                <div class="nemovitost-image"
                     style="background-image: url(&quot;http://szukajdom.eu/wp-content/uploads/system_data/default_4f22e7f1fd7e65913d121129888cb4d9.jpg&quot;);">
                </div>
                <div class="nemovitost-text">
                    <h3>Nový byt, 3+kk, 80 m<sup>2</sup></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed bibendum varius mi, ac venenatis purus convallis eu. Ut blandit fringilla massa, eu mattis lorem posuere a. </p>
                </div>
                <div class="price-bar">
                    <h4 class="price">15&nbsp;000&nbsp;Kč </h4> <a href="http://szukajdom.eu/inzerat/8/" class="btn more">Detail inzerátu</a>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-12 nemovitost nemovitost-top">
            <div class="nemovitost-wrapper">
                <div class="nemovitost-image"
                     style="background-image: url(&quot;http://szukajdom.eu/wp-content/uploads/system_data/default_4f22e7f1fd7e65913d121129888cb4d9.jpg&quot;);">
                </div>
                <div class="nemovitost-text">
                    <h3>Nový byt, 3+kk, 80 m<sup>2</sup></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed bibendum varius mi, ac venenatis purus convallis eu. Ut blandit fringilla massa, eu mattis lorem posuere a. </p>
                </div>
                <div class="price-bar">
                    <h4 class="price">15&nbsp;000&nbsp;Kč </h4> <a href="http://szukajdom.eu/inzerat/8/" class="btn more">Detail inzerátu</a>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-12 nemovitost">
            <div class="nemovitost-wrapper">
                <div class="nemovitost-image"
                     style="background-image: url(&quot;http://szukajdom.eu/wp-content/uploads/system_data/default_4f22e7f1fd7e65913d121129888cb4d9.jpg&quot;);">
                </div>
                <div class="nemovitost-text">
                    <h3>Nový byt, 3+kk, 80 m<sup>2</sup></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed bibendum varius mi, ac venenatis purus convallis eu. Ut blandit fringilla massa, eu mattis lorem posuere a. </p>
                </div>
                <div class="price-bar">
                    <h4 class="price">15&nbsp;000&nbsp;Kč </h4> <a href="http://szukajdom.eu/inzerat/8/" class="btn more">Detail inzerátu</a>
                </div>
            </div>
        </div>




    </div>
    -->
</div>
