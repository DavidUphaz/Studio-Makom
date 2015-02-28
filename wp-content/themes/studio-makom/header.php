<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Studio Makom
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" type="image/ico" href="<?php echo get_template_directory_uri().'/favicon.png'; ?>" />
<?php wp_head(); ?>

</head>

<?php


/*
 *
 *  functions for menu markup generation
 */

function the_menu_items()
{
    global $post;
    if (!$post)
    {
        return;
    }
    $pages = get_pages( array( 'sort_column' => 'menu_order') );
    foreach($pages as $page){
        if (strpos(get_page_template_slug($page->ID), 'single-project') != FALSE)
            continue;
        echo '<li ' . ($post->ID == $page->ID ? 'class="active"' : '') . '><a href="'. get_page_link($page) . '">' . $page->post_title . '</a></li>'.PHP_EOL;
    }
}
?>

 <body <?php body_class('studio_makom_body'); ?>>
    <div class="navbar navbar-default navbar-transp" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <img src="<?php echo get_template_directory_uri(); ?>/Assets/show_bar.png" alt="">
                </a>
                <a type="button" class="logo-mobile pull-right" href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/Assets/logo-mobile.jpg" alt="">
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php the_menu_items() ?>
                </ul>
            </div><!--/.nav-collapse -->
	</div>
    </div>
    <div id="top" class="container" >
