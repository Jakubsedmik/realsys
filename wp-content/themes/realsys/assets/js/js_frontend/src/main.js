


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


/*
 user uploader handling
 */

/*$("#user_file_pick").dmUploader({
    url: serverData.ajaxUrl,
    extraData: {
        "action": "file_upload"
    },
    maxFileSize: Number(serverData.upload_size),
    allowedTypes: "image/*",
    extFilter: ["jpg", "jpeg"],
    multiple: false,
    fieldName: "uploadedImg",

    onInit: function(){
        console.log('Callback: Plugin initialized');
    },
    onBeforeUpload(id){
        popupsHandler.showPopup("user_uploader")
    },
    onFileTypeError(file){
        alert("Zvolili jste špatný typ souboru");
    },
    onUploadProgress(id, percent){
        var progressbar = $("#user_uploader .js-progressbar");
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
    }
});*/


// validace formů
$(document).ready(function () {
    $(".js-user-passwords").validate({
            rules : {
                heslo : {
                    required : true,
                    minlength : 6
                },
                heslo_potvrzeni : {
                    required : true,
                    minlength : 6,
                    equalTo : "#heslo"
                }
            },
        messages : {

            heslo : {
                required : "Heslo musít být vyplněno",
                minlength : "Heslo musí mit alespoň 6 znaků"
            },
            heslo_potvrzeni: {
                required : "Heslo musít být vyplněno",
                minlength : "Heslo musí mit alespoň 6 znaků",
                equalTo : "Hesla se musí shodovat"
            }
        }
    });
    $(".js-upload, .js-user-details").validate({
            rules : {
                jmeno : {
                    required : true,
                    minlength : 3
                },
                prijmeni : {
                    required : true,
                    minlength : 3
                },
                email : {
                    required : true,
                    remote : {
                        url : serverData.ajaxUrl,
                        type : "post",
                        data : {
                            action : "check_email"
                        }
                    }
                },
                heslo : {
                    required : true,
                    minlength : 6
                },
                heslo_potvrzeni : {
                    required : true,
                    minlength : 6,
                    equalTo : "#heslo"
                },
                souhlas_podminky : {
                    required : true
                },
                souhlas_osudaje : {
                    required : true
                }
            },
            messages : {
                jmeno : {
                    required : "Jméno musí být vyplněno.",
                    minlength : "Jméno musí mít minimálně 3 znaky"
                },
                prijmeni : {
                    required : "Příjmení musí být vyplněno",
                    minlength : "Příjmení musí mít minimálně 3 znaky"
                },
                email : {
                    required : "Email musí být vyplněný",
                    email : "Email je ve špatném formátu. Správný formát test@seznam.cz"
                },
                heslo : {
                    required : "Heslo musít být vyplněno",
                    minlength : "Heslo musí mit alespoň 6 znaků"
                },
                heslo_potvrzeni: {
                    required : "Heslo musít být vyplněno",
                    minlength : "Heslo musí mit alespoň 6 znaků",
                    equalTo : "Hesla se musí shodovat"
                },
                souhlas_podminky: {
                    required : "S podmínkami soutěže musíte souhlasit"
                },
                souhlas_osudaje: {
                    required : "S podmínkami zpracování os. údajů musíte souhlasit"
                }
            },
            highlight : function (element, errorClass) {
                $(element).addClass("validation-error");
            },
            unhighlight : function (element, errorClass) {
                $(element).removeClass("validation-error");
            },
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
    );
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

$(document).ready(function(){

    if($(document).outerWidth() > 800){
        if($("body").hasClass("logged-in")){
            $(".main-header").sticky({topSpacing:32});
        }else{
            $(".main-header").sticky({topSpacing:0});
        }
    }
});


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
$(document).ready(function () {
    var lightbox = $('.lightbox-image').simpleLightbox();
});


// remove photos
$(document).ready(function () {
   $("body").on("click", ".js-removePhoto", function (e) {
       var id = $(this).attr("data-removeid");
       var con = confirm("Opravdu chcete smazat tuto fotografii?");
       var holder = $(this).closest(".galerie-imgbox");
       var dataToSnd = {
           remove_id : id,
           "action" : "remove_photo",
           wp_nonce: serverData.ajax_nonce
       };
       if(con){
       jQuery.post(serverData.ajaxUrl, dataToSnd).done(function (data) {
           if("status" in data && data.status == 1){
               alert("Fotografie byla úspěšně smazána.");
               holder.remove();
           }else{
               alert("Došlo k chybě, nejspíš nejste přihlášeni.");
           }
       }).fail(function () {
           alert("Smazání se nezdařilo. Kontaktujte podporu");
       });
       }
   }) 
});


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




// change foto tlačítko

$(document).ready(function () {
   $("body").on("click", ".js-change-photo",function (e) {
       e.preventDefault();
       resetUploader();
       $("#filepicker").trigger("click");
   });
});


// confirmation

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




