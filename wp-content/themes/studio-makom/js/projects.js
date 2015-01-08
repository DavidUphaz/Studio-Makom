
jQuery(document).ready(function(){

    jQuery('.img-overlay').hover(function()
    {
        jQuery(this).find('.overlay-absolute').show();
    }, function()
    { 
         jQuery(this).find('.overlay-absolute').hide();
    });
});