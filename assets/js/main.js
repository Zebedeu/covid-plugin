jQuery(document).ready(function(){
    jQuery("header #count-tracking").remove().clone().appendTo(".mg-nav-widget-area .row");
    jQuery(".mg-nav-widget-area #count-tracking").wrap('<div class="col-md-9 col-sm-8 text-right"></div>').show();

    // Hora
    jQuery(".mg-head-detail .info-left").clone().appendTo(".mg-latest-news")

    // Midias Sociais
    jQuery("header .mg-social").clone().appendTo("#navbar-wp");

    jQuery(".icon-soci.facebook a").html('<img src="'+assetsCovid+'/images/icon-facebook.svg" alt="Curta nossa página no Facebook">');
    jQuery(".icon-soci.instagram a").html('<img src="'+assetsCovid+'/images/icon-instagram.svg" alt="Siga nosso Instagram">');
})