<?php
/**
 * Template Name: about-us
 */
?>
<?php get_header(); ?>
<div class="mobile-content" style="background: url( <?php  echo get_field('background')['url']; ?>) no-repeat center; background-size: cover;">
    <div class="content-wrapper-mobile">
        <?php echo get_field('text'); ?>
    </div>
</div>
<div class="row non-mobile-content">
    <div class="carousel">
        <div class="carousel-inner">
            <div class="item active" style="background-image: url( <?php  echo get_field('background')['url']; ?>)">
                <div class="content-wrapper">
                    <div class="image" style="background-image: url( <?php  echo get_field('background_1')['url']; ?>)">
                    </div>
                    <div class="text mCustomScrollbar" data-mcs-theme="dark">
                        <?php echo get_field('text'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>