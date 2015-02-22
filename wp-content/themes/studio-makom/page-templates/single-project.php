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
    echo '  <div class="col-xs-6 project-drawing pull-right" style="background-image:url(' . get_field('drawing')['url'] . ');"></div>';
    echo '  <div class="col-lg-12 project-carousel">';
    echo '      <div id="carousel_1"  class="carousel slide" data-ride="carousel" data-interval="false">';
    echo '          <div class="carousel-inner">';
    $gallery = get_field('gallery');
    $tiny = get_template_directory_uri() . '/Assets/tiny.png';
    $counter = 1;
    foreach($gallery as $image){
        $url = $image['url'];
        $class = ' class="item background-contain' . ($counter == 1 ? ' active' : '') . ' " ';
        if ($counter > 1) {
            $id = ' id="lazy-' . $counter . '" ';
            $image_src = ' lazy-image="' . $url . '" ';
            $background_image_src = $tiny;
        }
        else {
            $image_src = $id = '';
            $background_image_src = $url;
        }
        echo '<div ' . $id . $class . $image_src . 'style="background-image: url(' . $background_image_src . ');" ></div>' . PHP_EOL;
        $counter++;
    }
    echo '          </div>';
    echo '      </div>';
    echo '  </div>';
    echo '</div>';
    echo '<div class="row content-controls">';
    echo '      <div class="col-xs-9 btn-group" style="height:30px; margin-bottom: 5px;">';
    echo '          <a id="projects" class="btn btn-link" href="'. get_page_link(get_page_by_title('פרוייקטים')->ID) . '"' . '>פרוייקטים</a>';
    echo '          <a class="btn btn-link anchor-prev-slide" href="#carousel_1" data-slide="prev"><img src="' . $template_dir_uri . '/Assets/arrows-left-icon.png"/></a>';
    echo '          <a class="btn btn-link anchor-next-slide" href="#carousel_1" data-slide="next"><img src="' . $template_dir_uri . '/Assets/arrows-right-icon.png"/></a>';
    echo '          <a id="slide_counter" class="btn btn-link disabled-anchor" style="cursor:default;">4/13</a>';
    echo '          <a id="text" class="btn btn-link text-vs-gallery">תכנית וטקסט</a>';
    echo '      </div>';
    echo '      <div class="col-xs-3"><a class="btn btn-link pull-right disabled-anchor">' . get_the_title() . '</a></div>';
    echo '</div>';
}
?>

<?php get_header(); ?>
<?php echo_single_project(); ?>
<?php get_footer(); ?>