var gallery_content = '.project-carousel';
var text_content = '.project-text,.project-drawing';
var fade_duration = 500;

function gallery_visible()
{
    return(jQuery(gallery_content).is(":visible"));
}

function text_vs_gallery(state)
{   
    if (state === "text")
    {
        jQuery(gallery_content).hide();
        jQuery(text_content).fadeIn(fade_duration);
    }
    else
    {
        jQuery(text_content).hide();
        jQuery(gallery_content).fadeIn(fade_duration);
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
    jQuery('.carousel-inner,.project-text,.project-drawing').outerHeight(content_height() - jQuery('.content-controls').outerHeight(true));
    jQuery('.project-text,.project-drawing').outerWidth(jQuery('.top-row').innerWidth() * .45);
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
    //Set some elements to viewport size (css vw/vh does not work in too many cases)
    jQuery(window).bind("resize load",function(){
        resize();
    });

    jQuery('.text-vs-gallery').click(function(){
        if (gallery_visible())
            show_text();
        else
            show_gallery();
    });
    
    jQuery('.carousel').bind('slid.bs.carousel', function() {
        update_slide_counter();
        if (!gallery_visible())
            show_gallery();
    });   
});