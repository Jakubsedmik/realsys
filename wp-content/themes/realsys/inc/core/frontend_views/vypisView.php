<div class="app">
    <Vypis
            assetspath="<?php echo FRONTEND_IMAGES_PATH; ?>"
            apiurl="<?php echo AJAXURL . "?action=getInzeraty"; ?>"
            :filters="<?php echo $this->requestData['filter']; ?>"
            :filterpreset="<?php echo $this->requestData['filterPreset']; ?>"
            home_url="<?php echo home_url(); ?>"
            :user_logged="<?php echo (uzivatelClass::getUserLoggedId()) ? uzivatelClass::getUserLoggedId() : "false"; ?>">
    </Vypis>
</div>
