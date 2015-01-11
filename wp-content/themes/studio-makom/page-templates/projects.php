<?php
/**
 * Template Name: projects
 */
?>

<?php
function echo_projects()
{
    $projects = get_pages(array(
        ‘meta_key’ => ‘_wp_page_template’,
        ‘meta_value’ => ‘single-project.php’,
        ‘hierarchical’ => 0
    ));
    echo '<div class="row">';
    foreach($projects as $project){
        echo '<div class="col-xs-12 col-sm-6 col-md-4">';
        echo '  <div class="img-overlay">';
        echo '      <img src="' . get_field('thumbnail', $project->ID)['url'] . '" class="img-responsive"/>';
        echo '      <a href="' . get_page_link($project->ID) .'" class="overlay-absolute">';
        echo '          <div class="overlay-table">';
        echo '              <div class="overlay-middle">';
        echo '                  <div class="overlay-text">';
        echo                        get_field('short_description', $project->ID);
        echo '                  </div>';
        echo '              </div>';
        echo '          </div>';
        echo '      </a>';
        echo '  </div>';
        echo '</div>';
    }
    echo '</div>';
}
?>

<?php get_header(); ?>
<?php echo_projects(); ?>
<?php get_footer(); ?>