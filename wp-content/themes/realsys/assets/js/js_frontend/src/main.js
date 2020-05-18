


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
    console.log("showing popup");
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



// VALIDACE FORMULÁŘŮ


$(document).ready(function () {

    $.validator.addMethod( "phoneCZ", function( phone_number, element ) {
        phone_number = phone_number.replace( /\s+/g, "" );
        var regexp = /^(\+420)? ?[1-9][0-9]{2} ?[0-9]{3} ?[0-9]{3}$/;
        return this.optional( element ) || regexp.test( phone_number );
    }, "Toto číslo není validní." );

    $.validator.addMethod( "zip", function( phone_number, element ) {
        phone_number = phone_number.replace( /\s+/g, "" );
        var regexp = /\d{3} ?\d{2}/;
        return this.optional( element ) || regexp.test( phone_number );
    }, "Toto PSČ není validní. Formát 123 45." );



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

/*$(document).ready(function(){

    if($(document).outerWidth() > 800){
        if($("body").hasClass("logged-in")){
            $(".main-menu-top").sticky({topSpacing:32});
        }else{
            $(".main-menu-top").sticky({topSpacing:0});
        }
    }
});*/


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
        if(typeof  window[action] === "function"){
            window[action](element);
        }else{
            console.error("Volaná funkce neexistuje");
        }
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
$(document).ready(function () {
    var map = $(".google-map");
    if(map.length > 0){
        var script = '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU9RxWxpRRoy9R-wAILv5Owb7GaXHLVaw&callback=initMap"></script>';
        $("body").append(script);
    }
});


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
        if(data.status == 1) {
            popupsHandler.showPopup("googleRegDetails");
            var el = $(".js-googleRegForm");
            el.find('[name="jmeno"]').val(profile.getGivenName());
            el.find('[name="prijmeni"]').val(profile.getFamilyName());
            el.find('[name="email"]').val(email);
            el.find('[name="gid"]').val(gid);
            el.find('[name="image"]').val(profile.getImageUrl());
            el.find('[name="token"]').val(token);
        }else if(data.status==2){
            // uživatel neexistuje ale je přihlášený jako google


        }else if(data.status == 0){
            $("body").append(data.actionHtml);
            var event = new Event('DOMContentLoaded');
            document.dispatchEvent(event);
        }else{
            alert(data.message);
        }
        gapi.auth2.getAuthInstance().disconnect();
    });

    /*
    If user doesnt exist open popup, request info and let register without password
     */
}


/* PREPARING FUNCTIONALITY */
$(document).ready(function () {
    $(".js-preparing").on("click", function (e) {
        e.preventDefault();
        alert("Tuto funkcinalitu pro Vás připravujeme");
    });
});



/* FILEPOND UPLOADER */
$(document).ready(function () {
    FilePond.setOptions({
        server: {
            url: serverData.ajaxUrl,
            method: 'POST',
            process: {
                onload: function (response) {
                    response = JSON.parse(response);
                    if(response.status == 1){
                        $(".js-uploadImageResult").text(response.message).show();
                        console.log("OK");
                        setTimeout(function () {
                            popupsHandler.hideAll();
                            $(".js-profile-img").css({'background-image': 'url(' + response.gallery_url + ')'});
                            $(".js-uploadImageResult").hide()
                            $("body").trigger("remove-files");
                        }, 1500);
                    }else{
                        alert("Došlo k chybě při uploadu souboru");
                    }
                },
                ondata: function (formData) {
                    var idUser = parseInt($("#uzivatel_id").val());
                    formData.append("action","changeUserAvatar");
                    formData.append("id", idUser);
                    return formData;
                },

            }
        },
        maxFiles: 1,
        allowMultiple: true,
        maxParallelUploads : 3,
        labelIdle : "Nahrajte svůj obrázek",
        labelFileLoading : "Načítání",
        labelFileProcessing : "Uploadování",
        labelFileProcessingComplete : "Úspěšně nahráno na server",
        labelFileProcessingAborted: "Zrušeno",
        labelTapToCancel: "Klepněte pro zrušení",
        labelTapToRetry: "Klepněte pro opakování",
        allowRevert: false

    });

    var pondEl = $('.my-pond').get(0);
    const pond = FilePond.create( pondEl );

    $("body").on("remove-files", function (e) {
        pond.removeFiles();
    });

});


/* CHANGE USER IMAGE */
$(document).ready(function () {
    $(".js-changeImage").click(function (e) {
        popupsHandler.showPopup("addUserImage");
    });
})


/* MENU BURGER MOBILE */
$(document).ready(function () {
    $("#nav-icon3").click(function () {
        $(this).toggleClass("open");
        $(".menu-wrap").toggleClass("active");
    });
});


/* GALLERIE DETAIL */
$( document ).ready(function() {
    var galleries = $('.nemovitost-miniatury div a');
    if(galleries.length > 0){
        galleries.simpleLightbox();
    }
});


/* REMOVE, ACTIVATE, DEACTIVATE INZERAT */
$( document ).ready(function() {
    $(".js-send-request").click(function (e) {
        e.preventDefault();
        var confirm = $(this).attr("data-confirm") || false;
        if(confirm){
            confirmPopup(this, "processRequest");
        }else{
            processRequest(this);
        }
    });
});

function processRequest(element) {
    var allData = $(element).data();
    var postData = {};
    for(var i in allData){
        if(i.search("post") > -1){
            var newI = i.replace("post","").toLowerCase();
            postData[newI] = allData[i];
        }
    }

    var finishAction = $(element).attr('data-finish') || false;

    $.post(serverData.ajaxUrl, postData,function (data) {
        if(data.status==1){
            alert(data.message);
            if(finishAction && typeof window[finishAction] === "function"){
                window[finishAction](element);
            }
        }else{
            alert("Došlo k chybě:" + data.message);
            console.log(data.message);
        }
    }).fail(function () {
        alert("Nastala chyba v komunikaci se serverem");
    });
}

function removeInzerat(element) {
    $(element).closest(".nemovitost").remove();
}

function activeInzerat(element) {
    var nemovitost = $(element).closest(".nemovitost");
    nemovitost.removeClass("non-active");
    nemovitost.addClass("active");
    nemovitost.find(".inzeratActivator").hide();
    nemovitost.find(".inzeratDeactivator").show();
}

function deactiveInzerat(element) {
    var nemovitost = $(element).closest(".nemovitost");
    nemovitost.addClass("non-active");
    nemovitost.removeClass("active");
    nemovitost.find(".inzeratActivator").show();
    nemovitost.find(".inzeratDeactivator").hide();
}

function removePes(element) {
    $(element).closest(".js-watchdog").remove();
    var allDogs = $(".js-watchdog");
    if(allDogs.length == 0){
        $(".js-watchdogwrapper").remove();
    }
}


/* PŘEPÍNÁNÍ TABŮ A VYTVÁŘENÍ INZ */

$(document).ready(function (e) {

    $(".js-partialValidation").each(function (index) {
        serverData.rules.db_obrazek_front = {
            required: function (element) {
                return $("#inzerat_obrazky").val().length > 0;
            }
        }
        $(this).validate({
            rules : serverData.rules,
            messages: serverData.messages,
        });
    });

    $(".js-next-tab").click(function () {

        var form = $(this).closest(".js-inz-tab").find(".js-partialValidation");
        console.log(form);
        var proceed = true;
        if(form.length){
            console.log(form);
            proceed = false;
            proceed = form.valid();
        }
        if(proceed){
            var current = $(".js-inz-tab.active");
            console.log(current);
            current.removeClass("active");
            var next = current.next();
            next.addClass("active");

            var currentNavItem = $(".js-nav-tabs .js-nav-link.active");
            var nextNavItem = currentNavItem.next();

            currentNavItem.removeClass("active");
            nextNavItem.addClass("active");

            window.scrollTo({
                'behavior': 'smooth',
                'left': 0,
                'top': 0
            });
        }
    });

    $(".js-finish").click(function () {
        var main = $(".js-form-wrapper");
        var allPartials = main.find(".js-partialValidation");
        allPartials.each(function (index, val) {
            $(this).changeElementType("div");
        })
        main.changeElementType("form");
        main = $("form.js-form-wrapper");
        main.attr("method", "post");
        main.submit();
    });

    $(".js-prev-tab").click(function () {
        var current = $(".js-inz-tab.active");
        current.removeClass("active");
        var next = current.prev();
        next.addClass("active");

        var currentNavItem = $(".js-nav-tabs .js-nav-link.active");
        var prevNavItem = currentNavItem.prev();

        currentNavItem.removeClass("active");
        prevNavItem.addClass("active");

        window.scrollTo({
            'behavior': 'smooth',
            'left': 0,
            'top': 0
        });
    });

    /*$(".js-nav-link").click(function (e) {
        e.preventDefault();
        $(".js-nav-tabs .js-nav-link.active").removeClass("active");
        $(".js-tabs .active").removeClass("active");
        var target = $(this).find("a").attr("href");

        $(target).addClass("active");
        $(this).addClass("active");
    });*/

    (function($) {
        $.fn.changeElementType = function(newType) {
            var attrs = {};

            $.each(this[0].attributes, function(idx, attr) {
                attrs[attr.nodeName] = attr.nodeValue;
            });

            this.replaceWith(function() {
                return $("<" + newType + "/>", attrs).append($(this).contents());
            });
        };

    })(jQuery);

    $(".js-transfer-to-prototype").click(function (e) {
        var imageUrl = $(".js-loadedImages-wrapper .selected-image").attr("data-url");
        var image = $(".js-nem-prototype-image");
        image.css({"background-image": "url('" + imageUrl + "')"});

        var mesto = $('input[name="db_mesto"]').val();
        $(".js-nem-prototype-location").text(mesto);

        var podlahova_plocha = $('input[name="db_podlahova_plocha"]').val();
        $(".js-nem-prototype-area").text(podlahova_plocha);

        var popis = $('textarea[name="db_popis"]').val();
        $(".js-nem-prototype-description").text(popis);

        var cena = $('input[name="db_cena"]').val();
        $(".js-nem-prototype-price").text(cena);

        var titulek = $('input[name="db_titulek"]').val();
        $(".js-nem-prototype-name").text(titulek);
    });



    // PHOTO UPLOADER FOR INZERAT
    /*FilePond.setOptions({
        server: {
            url: serverData.ajaxUrl,
            method: 'POST',
            process: {
                onload: function (response) {
                    response = JSON.parse(response);
                    if(response.status == 1){
                        $(".js-loadedImages").fadeIn();
                        var prototype = $(".js-loadedImagePrototype");
                        var newImage = prototype.clone();
                        newImage.removeClass("js-loadedImagePrototype").removeClass("image-prototype");
                        newImage.find(".js-loadedImageItself").css({"background-image" : "url(" + response.gallery_url + ")"});
                        newImage.attr('data-id', response.db_id);
                        newImage.attr("data-url", response.gallery_url);
                        $(".js-loadedImages-wrapper").append(newImage);

                        var newOption = '<option selected value="' + response.db_id + '">obr</option>';
                        $("#inzerat_obrazky").append(newOption);

                    }else{
                        alert("Došlo k chybě při uploadu souboru");
                    }
                },
                ondata: function (formData) {
                    var idUser = parseInt($("#uzivatel_id").val());
                    formData.append("action","createInzeratImages");
                    formData.append("id", idUser);
                    return formData;
                },

            }
        },
        maxFiles: 10,
        allowMultiple: true,
        maxParallelUploads : 3,
        labelIdle : "Nahrajte obrázky inzerátu",
        labelFileLoading : "Načítání",
        labelFileProcessing : "Uploadování",
        labelFileProcessingComplete : "Úspěšně nahráno na server",
        labelFileProcessingAborted: "Zrušeno",
        labelTapToCancel: "Klepněte pro zrušení",
        labelTapToRetry: "Klepněte pro opakování",
        allowRevert: false

    });*/

    var pondEl = $('.js-add-inzerat-photos input').get(0);
    const pond = FilePond.create( pondEl );

    $("body").on("remove-files", function (e) {
        pond.removeFiles();
    });

    /*$("body").on("click", ".js-choose-image", function (e) {
        var idFront = $(this).attr("data-id");
        $(".js-loadedImages-wrapper .selected-image").removeClass("selected-image");
        $(this).addClass("selected-image");

        $("#obrazek_front").val(idFront);
    });*/

})



/* JCF INICIALIZACE MAJK */
$(document).ready(function(){
    $('select').attr('data-jcf', '{"wrapNative": false, "wrapNativeOnMobile": false}');
});
$(function () {
    jcf.replaceAll();
});



/* TOGGLE PATIČKY */
jQuery(document).ready(function($){
    $('footer div.col-sm:nth-child(2) h3').click(function(){
        $('footer div.col-sm:nth-child(2) ul').toggle();
    });

    $('footer .rn_widget_2').click(function(){
        $('footer .rn_widget_menu_2').toggle();
    });

    $('footer .rn_widget_3').click(function(){
        $('footer .rn_widget_menu_3').toggle();
    });

    $('.show-user-edit').click(function(){
        $('.profil-form').toggle();
        $('.profil-view').toggle();
    });
});


/* TABY SLUŽEB */
$(document).ready(function() {

    $('#tabs li:not(:first)').addClass('inactive');
    $('.tab-sl-content').hide();
    $('.tab-sl-content:first').show();

    $('#tabs li').click(function(){
        var t = $(this).attr('id');
        if($(this).hasClass('inactive')){ //this is the start of our condition
            $('#tabs li').addClass('inactive');
            $(this).removeClass('inactive');

            $('.tab-sl-content').hide();
            $('#'+ t + 'C').fadeIn('slow');
        }
    });
});

/* TABY V PROFILU */
$(document).ready(function() {
    $('.profil li a:not(:first)').addClass('inactive');
    $('.tab-sl-content').hide();
    $('.tab-sl-content:first').show();

    $('.profil li a').click(function(){
        var t = $(this).attr('id');
        if($(this).hasClass('inactive')){ //this is the start of our condition
            $('.profil li a').addClass('inactive');
            $(this).removeClass('inactive');

            $('.tab-sl-content').hide();
            $('#'+ t + 'C').fadeIn('slow');
        }
    });
});






