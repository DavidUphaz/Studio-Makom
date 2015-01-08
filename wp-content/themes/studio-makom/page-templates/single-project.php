<?php
/**
 * Template Name: single-project
 */
?>

<?php
function echo_single_project()
{
    echo '<div class="row">';
    echo '  <div class="col-xs-6 my-text">';
    echo    get_field('detailed_description');
    echo '  </div>';
    echo '  <img src="' . get_field('drawing')['url'] . '" class="col-xs-6 my-plan drawing-image">';
    echo '  <div class="col-md-12 my-carousel">';
    echo '      <div id="carousel_1"  class="carousel slide" data-ride="carousel" data-interval="false">';
    echo '          <div class="carousel-inner">';
    $active_item = " active";
    $gallery = get_field('gallery');
    write_log($gallery);
    foreach($gallery as $image){
        echo '              <div class="item image-cover' . $active_item .'" style="background-image: url(' . $image['url'] . ');" ></div>' . PHP_EOL;
        $active_item = "";
    }
    echo '          </div>';
    echo '      </div>';
    echo '  </div>';
    echo '</div>';
    echo '<div class="row">';
    echo '  <div class="col-md-12">';
    echo '      <div class="btn-group" "col-md-10">';
    echo '          <a class="btn anchor-next-slide" href="#carousel_1" data-slide="prev">Previous</a>';
    echo '          <a class="btn anchor-next-slide" href="#carousel_1" data-slide="next">Next</a>';
    echo '          <a class="btn toggle-text-gallery">Text</a>';
    echo '      </div>';
    echo '  </div>';
    echo '</div>';
}
?>

<?php get_header(); ?>
<?php echo_single_project(); ?>
<?php get_footer(); ?>