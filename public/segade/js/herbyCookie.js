(function($) {
    $.fn.herbyCookie = function(options) {
        var settings = $.extend({
            style: "light",
            btnText: "¡Ok!",
            policyText: "Política de cookies",
            text: "Utilizamos cookies propias y de terceros para mejorar nuestros servicios. Si continua navegando, consideramos que acepta su uso. Puede cambiar la configuración u obtener más información en el siguiente enlace",
            scroll: false,
            link: "/politicas-legales"
        }, options);
        var herbyHtml = "<div class='herbyCookieConsent herbyIn'><p>" + settings.text + " " + "<a alt='" + settings.policyText + "' href='" + settings.link + "' target='_blank'>" + settings.policyText + "</a>.</p><a alt='" + settings.btnText + "' class='herbyBtn'>" + settings.btnText + "</a></div>";
        if (settings.style == "light") {
            var color = "#424242";
            var bg = "#f6f6f6"
        } else {
            var color = "#fff"
            var bg = "#222"
        };
        var herbyCss = "<!-- Herby Cookie Consent CSS -->" + '<style>@-webkit-keyframes herbyIn{from{-webkit-transform:translate3d(0, 100%, 0);transform:translate3d(0, 100%, 0);visibility:visible}to{-webkit-transform:translate3d(0, 0, 0);transform:translate3d(0, 0, 0)}}@keyframes herbyIn{from{-webkit-transform:translate3d(0, 100%, 0);transform:translate3d(0, 100%, 0);visibility:visible}to{-webkit-transform:translate3d(0, 0, 0);transform:translate3d(0, 0, 0)}}.herbyIn{-webkit-animation-name:herbyIn;animation-name:herbyIn}@-webkit-keyframes herbyOut{from{opacity:1}to{opacity:0;-webkit-transform:translate3d(0, 100%, 0);transform:translate3d(0, 100%, 0)}}@keyframes herbyOut{from{opacity:1}to{opacity:0;-webkit-transform:translate3d(0, 100%, 0);transform:translate3d(0, 100%, 0)}}.herbyOut{-webkit-animation-name:herbyOut;animation-name:herbyOut}.herbyCookieConsent{position:fixed;left:0;right:0;bottom:0;overflow:hidden;width:100%;background:' + bg + ' none repeat scroll 0 0;color:' + color + ';box-sizing:border-box;padding:15px 20px;vertical-align:middle;z-index:99999;display:inline-block;-webkit-animation-duration:1s;animation-duration:1s;-webkit-animation-fill-mode:both;animation-fill-mode:both}.herbyCookieConsent p{display:inline-block;vertical-align:middle;font-size:18px;width:80%;float:left;font-family:"Helvetica Neue Light","HelveticaNeue-Light","Helvetica Neue","Calibri","Helvetica","Arial";margin-top:.7em}.herbyCookieConsent p a{color:#40596b;vertical-align:middle;font-size:1em}.herbyCookieConsent .herbyBtn{float:right;font-size:1em;text-decoration:none;border-bottom:1px solid #b0b0b0;border-top:none;border-left:none;border-right:none;text-align:center;padding:10px 8px 9px 8px;cursor:pointer;cursor:hand;line-height:21px !important;position:relative;border-radius:5px;border-bottom-width:3px;overflow:hidden;display:inline-block;word-wrap:break-word;background-color:#cc9900;color:#fff;border-color:#967105;font-size:20px;padding-left:10px;padding-right:10px;width:auto;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;vertical-align:middle;-webkit-tap-highlight-color:rgba(255,255,255,0);tap-highlight-color:rgba(255,255,255,0)}.herbyCookieConsent .herbyBtn:hover{background-color:#dca500;border-color:#967105;color:#fff;text-decoration:none;outline:none}.herbyCookieConsent .herbyBtn:focus{text-decoration:none;outline:none}.herbyCookieConsent .herbyBtn:active{background-color:#967105;border-color:#967105;color:#fff;padding-top:13px;padding-bottom:6px}@media all and (max-width:1000px){.herbyCookieConsent p{width:66%;font-size:.8em}.herbyCookieConsent .herbyBtn{padding:9px 8px 8px 8px}.herbyCookieConsent .herbyBtn:active{padding-top:12px;padding-bottom:5px}}@media all and (max-width:500px){.herbyCookieConsent{text-align:center}.herbyCookieConsent p{width:100%;float:none;text-align:left;font-size:.7em}.herbyCookieConsent .herbyBtn{float:none;margin-top:10px;padding:6px 8px 5px 8px}.herbyCookieConsent .herbyBtn:active{padding-top:9px;padding-bottom:2px}}</style>';
        var herbyStorage = "herbyCookie" + "_" + window.location.hostname;
        var herbyConsent = localStorage.getItem(herbyStorage);
        if (!(herbyConsent == "accept")) {
            $("body").append(herbyHtml), $("html").append(herbyCss);
        };
        $(".herbyBtn").click(closeHerby);
        if (settings.scroll == true) {
            $(window).scroll(closeHerby);
        };

        function closeHerby() {
            $(".herbyCookieConsent").removeClass("herbyIn").addClass("herbyOut");
            localStorage.setItem(herbyStorage, "accept");
            setTimeout(function() {
                $(".herbyCookieConsent").remove();
            }, 1001);
        };
    };
}(jQuery));