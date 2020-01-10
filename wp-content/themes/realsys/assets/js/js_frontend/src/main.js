


/* kontroller pro pupupy */
function popupsController() {
    this.popups = $(".js-popup");
}

popupsController.prototype.hideAll = function () {
    this.popups.removeClass("show");
    this.enableScroll();
}

popupsController.prototype.showPopup = function (idpopup) {
    this.hideAll();
    this.popups.each(function (index, obj) {
        if($(obj).attr("id") == idpopup){
            $(obj).addClass("show");
        }
    });
    this.disableScroll();
}

popupsController.prototype.hidePopup = function (closerElement) {
    var popup = closerElement.closest(".js-popup");
    popup.removeClass("show");
    this.enableScroll();
}

popupsController.prototype.addListeners = function (e) {
    var _this = this;
    $("body").on("click", ".js-openPopup", function () {
        var modalid = $(this).attr("data-openmodalid");
        _this.showPopup(modalid);
    });

    $("body").on("click", ".js-closePopup", function (e) {
        var callback = $(this).attr("data-callback");
        if(callback && typeof window[callback] === "function"){
            window[callback]();
        }else{
            console.log("function doesnt exist");
        }
        _this.hidePopup($(this));
    });
}

popupsController.prototype.disableScroll = function(){
    $("body, html").addClass("disableScroll");
}

popupsController.prototype.enableScroll = function(){
    $("body, html").removeClass("disableScroll");
}

var popupsHandler = new popupsController();
popupsHandler.addListeners();



/*
Otevírání file, delegace
 */

$("body").on("click touchstart",".js-delegateClick", function (e) {
    var delegateElement = $(this).attr("data-delegateelement");
    $("#" + delegateElement).trigger("click");
});


/*
uploader handling
 */

/*$("#filepicker").dmUploader({
    url: serverData.ajaxUrl,
    extraData: {
        "action": "file_upload"
    },
    maxFileSize: Number(serverData.upload_size),
    allowedTypes: "image/*",
    extFilter: ["jpg", "jpeg"],
    multiple: false,
    fieldName: "uploadedImg",
    //... More settings here...

    onInit: function(){
    },
    onBeforeUpload(id){
        popupsHandler.showPopup("uploader")
    },
    onFileTypeError(file){
        console.log("ERROR");
        alert("Zvolili jste špatný typ souboru");
    },
    onUploadProgress(id, percent){
        var progressbar = $("#uploader .js-progressbar");
        progressbar.text(percent + "%");
        progressbar.css({width: percent+"%"})
    },
    onFileSizeError (file){
        alert("Soubor překročil hranici přípustné velikosti. Prosím vyberte soubor do 10mb");
    },
    onUploadSuccess(id, data){
        if("status" in data && data.status == 1) {
            setUploader(data);
        }else{
            alert("Došlo k chybě, kontaktujte prosím podporu");
        }
    },
    onFileExtError : function (file) {
        alert("Přípona souboru není správná - povolené je pouze jpg a jpeg");
    }
});*/

function cancelUploads() {
    $("#filepicker").dmUploader("cancel");
    resetUploader();
}

function resetUploader() {
    var progressbar = $("#uploader .js-progressbar");
    $(".js-loading-img").show();
    $(".js-loadingTitle").show();
    $(".js-uploadedImage").hide();
    $(".js-attend").addClass("js-disabled").addClass("s7-button--disabled");
    $("#url_full").val("");
    $("#url_thumb").val("");
    progressbar.text("0%");
    progressbar.css({width: 0});
}

function setUploader(data) {
    if("url_thumb" in data && "url" in data){
        $(".js-uploadedImage").attr("src", data.url_thumb);
        $(".js-loading-img").hide();
        $(".js-loadingTitle").hide();
        $(".js-uploadedImage").show();
        $(".js-attend").removeClass("js-disabled").removeClass("s7-button--disabled");
        $("#url_full").val(data.url);
        $("#url_thumb").val(data.url_thumb);
    }
}



// VALIDACE FORMULÁŘŮ


$(document).ready(function () {

    $.validator.addMethod( "phoneCZ", function( phone_number, element ) {
        phone_number = phone_number.replace( /\s+/g, "" );
        console.log("validation");
        var regexp = /^(\+420)? ?[1-9][0-9]{2} ?[0-9]{3} ?[0-9]{3}$/;
        return this.optional( element ) || regexp.test( phone_number );
    }, "Toto číslo není validní." );



    $(".js-validate-form").each(function (index, obj) {
        $(this).validate({
            rules : serverData.rules,
            messages: serverData.messages
        });
    });

    jQuery.extend(jQuery.validator.messages,
        serverData.common_messages
    );

    /*
    $(".js-upload, .js-user-details").validate({
            submitHandler : function (form) {
                if(grecaptcha){
                    if (grecaptcha.getResponse()) {
                        // 2) finally sending form data
                        form.submit();
                    }else{
                        // 1) Before sending we must validate captcha
                        grecaptcha.reset();
                        grecaptcha.execute();
                    }
                }else{
                    form.submit();
                }
            }
        }
    );*/
});


/* grecaptcha looop */

function grecaptchaSubmit(){
    $(".js-upload").submit();
    return true;
}

function grecaptchaSubmit2 (){
    $(".js-user-details").submit();
    return true;
}



/* sticky menu */
/*
$(document).ready(function(){

    if($(document).outerWidth() > 800){
        if($("body").hasClass("logged-in")){
            $(".main-header").sticky({topSpacing:32});
        }else{
            $(".main-header").sticky({topSpacing:0});
        }
    }
});
*/

/* js pro header zobrazení search a můj účet */

$(document).ready(function () {
    $("body").on("click", ".js-show-login-wrapper", function (e) {
        e.stopPropagation();
        $(".js-searchField-wrapper").removeClass("show");
       $(".js-login-wrapper").addClass("show");
    });

    $("body").on("click", ".js-login-wrapper.show", function () {
        e.stopPropagation();
    });

    $("body").on("click", function (e) {
        $(".js-login-wrapper").removeClass("show");
        $(".js-searchField-wrapper").removeClass("show");
    });


    $("body").on("click", ".js-show-search", function (e) {
        e.stopPropagation();
        $(".js-login-wrapper").removeClass("show");
        $(".js-searchField-wrapper").addClass("show");
    });

    $("body").on("click", ".js-searchField-wrapper.show", function () {
        e.stopPropagation();
    });
});


// disabled tlačítko

$(document).ready(function (e) {
    $("body").on("click", ".js-disabled", function (e) {
       e.preventDefault();
    });
});


// invisible reacaptcha

function onSubmit(token) {
    document.getElementById("i-recaptcha").submit();
}


// initialize lightboxes
/*$(document).ready(function () {
    var lightbox = $('.lightbox-image').simpleLightbox();
});*/



// mobile menu launcher

$(document).ready(function () {
    $("body").on("click",".js-launchMobileMenu",function (e) {
        var mobileMenu = $(".js-mobile-menu");
        if(mobileMenu.hasClass("opened")){
            mobileMenu.slideUp();
            mobileMenu.removeClass("opened");
        }else{
            mobileMenu.slideDown();
            mobileMenu.addClass("opened");
        }
    });
});



// CONFIRM POPUP

function confirmPopup(element, action){
    if($(".confirmPopup").length){
        var confirmPopUpElement = $(".confirmPopup");
    }else{
        var confirmPopUpElement = '<div class="fshr-confirmPopup">';
        var text = $(element).attr("data-popuptext") || "Opravdu toto chcete provést";
        var confirmText = $(element).attr("data-popupconfirm") || "Potvrdit";
        var denyText = $(element).attr("data-popupdeny") || "Zrušit";

        confirmPopUpElement += '<div class="fshr-innerConfirmPopup">';
        confirmPopUpElement += '<h3 class="">' + text + '</h3>';
        confirmPopUpElement += '<div class="fshr-confirmPopupButtons"><button class="fshr-confirm js-confirm">' + confirmText + '</button><button class="fshr-deny js-deny">' + denyText + '</button></div>'
        confirmPopUpElement += '</div>';
        confirmPopUpElement += '</div>';
        confirmPopUpElement = $(confirmPopUpElement);
        $("body").append(confirmPopUpElement);
    }
    confirmPopUpElement.hide();
    confirmPopUpElement.fadeIn(300);

    confirmPopUpElement.on("click", ".js-confirm", function(e){
        window[action](element);
        confirmPopUpElement.fadeOut(300);
    });

    confirmPopUpElement.on("click", ".js-deny", function(e){
        confirmPopUpElement.fadeOut(300);
    });
}

$(document).ready(function () {
   $("body").on("click",".js-let-confirm", function (e) {
        e.preventDefault();
        confirmPopup(this, "submitForm");
   });
});

function submitForm(element) {
    $(element).closest("form").submit();
}


/* MAP DETAIL INZERATU */
var map;
function initMap() {
    var mapElement = document.getElementsByClassName("google-map");
    if(mapElement && mapElement.length>0){

        var mapEl = mapElement[0];
        var lat = $(mapEl).data("lat");
        var lng = $(mapEl).data("lng");
        var contentString = $(mapEl).data("content") || false;
        var center = {'lat': lat, 'lng': lng};
        map = new google.maps.Map(mapElement[0], {
            'center': center,
            zoom: 12
        });

        var marker = new google.maps.Marker({
            position: center,
            map: map
        });

        if(contentString){
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            infowindow.open(map, marker);
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
        }
    }
}

/* LOGIN TABS */

// TODO je třeba dodělat sledování hash parametru
$(document).ready(function () {
    $(".js-tab").on("click", function (e) {
        e.preventDefault();
        var href = $(this).attr("href");
        $(".tab-content").hide();
        $(href).show();
        $(".js-tab").removeClass("active");
        $(this).addClass("active");
    });
});


/* GOOGLE LOGIN */

function onSignIn(googleUser) {

    var profile = googleUser.getBasicProfile();

    var gid = profile.getId();
    var email = profile.getEmail();
    var token = googleUser.getAuthResponse().id_token;

    /*
    First check if user doesnt exist, if yes - request login and redirect
     */

    $.post(serverData.ajaxUrl, {action: "googleVerification", 'email': email, 'gid': gid, 'token': token}, function (data) {
        if(data.status == 1){
            popupsHandler.showPopup("googleRegDetails");
            var el = $(".js-googleRegForm");
            el.find('[name="jmeno"]').val(profile.getGivenName());
            el.find('[name="prijmeni"]').val(profile.getFamilyName());
            el.find('[name="email"]').val(email);
            el.find('[name="gid"]').val(gid);
            el.find('[name="image"]').val(profile.getImageUrl());
            el.find('[name="token"]').val(token);
        }else if(data.status == 0){
            $("body").append(data.actionHtml);
            var event = new Event('DOMContentLoaded');
            document.dispatchEvent(event);
        }else{
            alert(data.message);
        }
    });




    /*
    If user doesnt exist open popup, request info and let register without password
     */
}








