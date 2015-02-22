function resize()
{
    common_resize();
}

jQuery(document).ready(function(){
    
    jQuery('.carousel').carousel({
            interval: 5000,
            pause: 'none'
    });
        
    resize();
    
    //Set some elements to viewport size (css vw/vh does not work in too many cases)
    jQuery(window).bind("load resize",function(){
        resize();
    });
});