<?php
/**
 * Template Name: front-page
 */
?>

<?php
function echo_front_page()
{
    echo '<div class="row">';
    echo '  <div id="carousel_1"  class="carousel slide" data-ride="carousel">';
    echo '      <div class="carousel-inner">';
    $gallery = get_field('gallery');
    $tiny = get_template_directory_uri() . '/Assets/tiny.png';
    $counter = 1;
    foreach($gallery as $image){
        //write_log($image['sizes']['large']);
        $url = is_mobile_url() ? $image['sizes']['large'] : $image['url'];
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
    echo '      </div>';
    echo '  </div>';
    echo '  <a style="display:none;" class="btn anchor-prev-slide" href="#carousel_1" data-slide="prev"></a>';
    echo '  <a style="display:none;" class="btn anchor-next-slide" href="#carousel_1" data-slide="next"></a>';
    echo '</div>';
}
?>

<?php get_header(); ?>
<?php echo_front_page(); ?>
<?php get_footer(); ?>