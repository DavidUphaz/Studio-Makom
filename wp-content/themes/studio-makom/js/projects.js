
jQuery(document).ready(function(){

    jQuery('.img-overlay').hover(function()
    {
        if (!is_mobile())
            jQuery(this).find('.overlay-absolute').show();
    }, function()
    {
        if (!is_mobile())
            jQuery(this).find('.overlay-absolute').hide();
    });
});