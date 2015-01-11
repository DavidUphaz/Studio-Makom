<?php
/**
 * Template Name: single-project
 */
?>

<?php
function echo_single_project()
{
    $template_dir_uri = get_template_directory_uri();
    echo '<div class="row top-row">';
    echo '  <div class="col-xs-6 project-text mCustomScrollbar" data-mcs-theme="dark">';
    echo        get_field('detailed_description');
    echo '  </div>';
    //echo '  <img src="' . get_field('drawing')['url'] . '" class="col-xs-6 project-drawing">';
    echo '  <div class="col-xs-6 project-drawing pull-right" style="background-image:url(' . get_field('drawing')['url'] . ');"></div>';
    echo '  <div class="col-lg-12 project-carousel">';
    echo '      <div id="carousel_1"  class="carousel slide" data-ride="carousel" data-interval="false">';
    echo '          <div class="carousel-inner">';
    $active_item = " active";
    $gallery = get_field('gallery');
    write_log($gallery);
    foreach($gallery as $image){
        echo '              <div class="item background-cover' . $active_item .'" style="background-image: url(' . $image['url'] . ');" ></div>' . PHP_EOL;
        $active_item = "";
    }
    echo '          </div>';
    echo '      </div>';
    echo '  </div>';
    echo '</div>';
    echo '<div class="row content-controls">';
    echo '      <div class="col-xs-11 btn-group" style="height:30px; margin-bottom: 5px;">';
    echo '          <a class="btn show-gallery">גלריה</a>';
    echo '          <a class="btn anchor-prev-slide" href="#carousel_1" data-slide="prev"><img src="' . $template_dir_uri . '/Assets/arrows-left-icon.png"/></a>';
    echo '          <a class="btn anchor-next-slide" href="#carousel_1" data-slide="next"><img src="' . $template_dir_uri . '/Assets/arrows-right-icon.png"/></a>';
    echo '          <a id="slide_counter" class="btn" disabled="true" style="cursor:default;">4/13</a>';
    echo '          <a class="btn show-text">תכנית וטקסט</a>';
    echo '      </div>';
    echo '      <div class="col-xs-1"><a class="btn pull-right">' . get_field('title') . '</a></div>';
    echo '</div>';
}
?>

<?php get_header(); ?>
<?php echo_single_project(); ?>
<?php get_footer(); ?>