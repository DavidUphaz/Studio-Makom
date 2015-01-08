function toggle_text_gallery(desired_state)
{
   if (desired_state === "Text") {
        jQuery('.my-carousel').hide();
        jQuery('.my-text').show();
        jQuery('.my-plan').show();
        jQuery('.toggle-text-gallery').html("Gallery");
    }
    else {
        jQuery('.my-carousel').show();
        jQuery('.my-text').hide();
        jQuery('.my-plan').hide();
        jQuery('.toggle-text-gallery').html("Text");
    }
}

jQuery(document).ready(function(){
    //Set some elements to viewport size (css vw/vh does not work in too many cases)
    jQuery(window).bind("load resize",function(event){
        if (event.type === 'load')
        {
            toggle_text_gallery("Gallery");
            jQuery('.my-text').css("padding-top", "100px");
            jQuery('.my-plan').css("padding-top", "100px");
        }
        jQuery('.carousel-inner').height(jQuery(window).height() - 110);
        jQuery('.my-text').height(jQuery(window).height() - 210);
        jQuery('.my-plan').height(jQuery(window).height() - 210);
    });
    
    jQuery('.toggle-text-gallery').click(function(){
        toggle_text_gallery(jQuery(this).html());
    });
});