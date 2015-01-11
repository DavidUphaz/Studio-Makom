
function text_vs_gallery(state)
{
    var text_controls = '.show-gallery';
    var gallery_controls = '.anchor-next-slide,.anchor-prev-slide,.show-text';
    var text_content = '.project-text,.project-drawing';
    var gallery_content = '.project-carousel';
    if (state === "text")
    {
        jQuery(gallery_content).hide();
        jQuery(text_content).show();
        jQuery(gallery_controls).attr('disabled', true);
        jQuery(text_controls).attr('disabled', false);
    }
    else
    {
        jQuery(gallery_content).show();
        jQuery(text_content).hide();
        jQuery(gallery_controls).attr('disabled', false);
        jQuery(text_controls).attr('disabled', true);
    }
}
function show_text()
{
    text_vs_gallery('text');
}

function show_gallery()
{
    text_vs_gallery('gallery');
}

function resize()
{
    var top_offset = jQuery('.top-row').offset().top;
    var bottom_offset = jQuery('.content-controls').outerHeight();
    var content_height = jQuery(window).innerHeight() - (top_offset + bottom_offset + 20);
    var content_width = jQuery('.top-row').innerWidth();
    jQuery('.carousel-inner,.project-text,.project-drawing').outerHeight(content_height);
    jQuery('.project-text,.project-drawing').outerWidth(content_width * .48);
}

function update_slide_counter()
{
    var totalItems = jQuery('.item').length;
    var current_slide = jQuery('div.active').index() + 1;
    jQuery('#slide_counter').html(current_slide + '/' + totalItems);
}

jQuery(document).ready(function(){
    update_slide_counter();
    show_gallery();
    resize();
    
    //Set some elements to viewport size (css vw/vh does not work in too many cases)
    jQuery(window).bind("load resize",function(){
        resize();
    });
    
    jQuery('.show-text').click(function(){
        show_text();
    });
    
    jQuery('.show-gallery').click(function(){
        show_gallery();
    });
    
    jQuery('.carousel').bind('slid.bs.carousel', function() {
        update_slide_counter();
    });
    
    // For touch devices -- change carousel images through swipe gestures
    jQuery('.item').swipe( {
        swipeLeft:function() {
            jQuery('.anchor-next-slide').trigger( "click" );
        },
        swipeRight: function() {
            jQuery('.anchor-prev-slide').trigger( "click" );
        },
        threshold:0
    });
});