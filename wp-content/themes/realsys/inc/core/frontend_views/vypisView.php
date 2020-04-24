<div class="app">
    <Vypis
            assetspath="<?php echo FRONTEND_IMAGES_PATH; ?>"
            apiurl="<?php echo AJAXURL . "?action=getInzeraty"; ?>"
            home_url="<?php echo home_url(); ?>"
            login_link="<?php echo Tools::getFERoute("uzivatelClass",false, "login"); ?>"
            payment_link="<?php echo Tools::getFERoute("objednavkaClass"); ?>"
            ajax_url="<?php echo AJAXURL; ?>"

            :filters="<?php echo $this->requestData['filter']; ?>"
            :filterpreset="<?php echo $this->requestData['filterPreset']; ?>"
            :user_logged="<?php echo (uzivatelClass::getUserLoggedId()) ? uzivatelClass::getUserLoggedId() : "false"; ?>"
            :service="<?php global $cenik_sluzeb; echo Tools::prepareJsonToOutputHtmlAttr($cenik_sluzeb[0]); ?>"
            >
    </Vypis>
</div>
