var mobile_media_query = "screen and (max-width:767px)";

function is_mobile()
{
    return(window.matchMedia( mobile_media_query ).matches);
}
function content_height() {
    var offset = 5;
    if (is_mobile())
        offset = -10;
    return(jQuery(window).innerHeight() - (jQuery('.navbar').outerHeight(true) + offset));
}

var fit_to_screen = true;
function common_resize()
{
    if (screenfull.isFullscreen){
        jQuery('.carousel-inner').css('height', '100%');
        jQuery('.carousel-inner').css('width', '100%');
    }
    else {
        if (is_mobile())
            jQuery('body').css('padding-top', "70px");
        else
            jQuery('body').css('padding-top', "118px");
        if (fit_to_screen)
            jQuery('.carousel-inner').outerHeight(content_height() - 9);
    }
}

function load_neighbours()
{
    var total_items = jQuery('.item').length;
    var current_slide = jQuery('div.active').index() + 1;
    var prev_slide = current_slide - 1;
    var next_slide = (current_slide + 1) % total_items;
    if (prev_slide === 0)
        prev_slide = total_items;
    var neighbours = [next_slide, prev_slide];
    for (var i = 0; i < neighbours.length; i++) {
        var lazy = '#lazy-' + neighbours[i];
        if (jQuery(lazy).length === 0 || !jQuery(lazy).is('[lazy-image]'))
            continue;
        var tmpImg = new Image() ;
        tmpImg.lazy = lazy;
        tmpImg.onload = function() {
            jQuery(this.lazy).css('background-image', 'url(' + this.src + ')');
        };
        tmpImg.src = jQuery(lazy).attr('lazy-image');
        jQuery(this.lazy).removeAttr('lazy-image');
    }
}

jQuery(document).ready(function(){
    jQuery('body').hide();
    
    jQuery(window).bind("load",function(){
        
        load_neighbours();
        jQuery('body').show();
        common_resize();
    });
    
    jQuery(window).bind("resize",function(){
        common_resize();
    });

   jQuery('.carousel').bind('slid.bs.carousel', function() {
       load_neighbours();
   }); 

   // For touch devices -- change carousel images through swipe gestures
   jQuery('.carousel .item').swipe( {
       tap:function() {
           
           if (screenfull.enabled){

                screenfull.toggle(jQuery('.carousel-inner')[0]);
           }
                
       },
       swipeLeft:function() {
           jQuery('.anchor-next-slide').trigger( "click" );
       },
       swipeRight: function() {
           jQuery('.anchor-prev-slide').trigger( "click" );
       },
       threshold:50
   });

   // Change carousel images through click
//    jQuery('.carousel .item').click(function(e){
//        var x = e.pageX - jQuery(this).offset().left;
//        var w = jQuery(this).innerWidth();
//        if (x > w/2)
//            jQuery('.anchor-next-slide').trigger( "click" );
//        else
//            jQuery('.anchor-prev-slide').trigger( "click" );
//   });
});